<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Pizza;
use App\Models\Pedido;
use App\Models\PedidoItem;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function home(): View
    {
        return view('home');
    }

    public function index(): View
    {
        $pizzas = Pizza::latest()->take(6)->get();
        return view('index', ['pizzas' => $pizzas]);
    }

    public function detalhe($id): View
    {
        $pizza = Pizza::findOrFail($id);
        return view('cardapio-detalhe', ['pizza' => $pizza]);
    }

    public function cardapio(): View
    {
        $pizzas = Pizza::all();
        return view('cardapio', ['pizzas' => $pizzas]);
    }

    public function sobre_nos(): View
    {
        return view('sobre-nos');
    }

    public function checkout(Request $request)
    {
        // Recupera o carrinho da sessão (definido pelo Livewire)
        $carrinho = session()->get('carrinho', []);

        // Pega o CEP (pode vir por GET ou POST)
        $cep = $request->input('cep') ?? $request->query('cep');
        session()->put('cep', $cep); // Armazena o CEP na sessão para uso posterior
        // Calcula o total com base no carrinho
        $total = collect($carrinho)->sum(function ($item) {
            return $item['small_price'] * $item['quantidade'];
        });
        // Retorna a view 'checkout.blade.php'
        return view('checkout', [
            'carrinho' => $carrinho,
            'cep' => $cep,
            'total' => $total
        ]);
    }

    public function finalizar_pedido()
    {
        $carrinho = session()->get('carrinho', []);
        $cep = session()->get('cep');


        DB::transaction(function () use ($carrinho, $cep) {
            $pedido = Pedido::create([
                'user_id' => auth()->id(),
                'total' => collect($carrinho)->sum(function ($item) {
                    return $item['small_price'] * $item['quantidade'];
                }),
                'status' => 'pendente',
                'cep' => $cep,
            ]);

            foreach ($carrinho as $item) {
                PedidoItem::create([
                    'pedido_id' => $pedido->id,
                    'pizza_id' => 1,
                    'tamanho' => 'M',
                    'quantidade' => $item['quantidade'],
                    'preco_unitario' => $item['small_price'],
                    'subtotal' => $item['small_price'] * $item['quantidade'],
                ]);
            }
        });

        session()->forget('carrinho');
        // dispatch('notification', type: 'success', title: 'Pedido finalizado com sucesso!');
        return redirect()->route('home')->with('success', 'Pedido finalizado com sucesso!');
    }

    public function cancelarPedido($id)
    {
        $pedido = Pedido::find($id);
        if (!$pedido || $pedido->user_id !== auth()->id()) {
            return redirect()->route('pedidos')->with('error', 'Pedido não encontrado ou acesso negado.');
        }
        $pedido->delete();

        $pedidos = PedidoItem::where('pedido_id', $id)->get();
        foreach ($pedidos as $item) {
            $item->delete();
        }

        return redirect()->route('pedidos')->with('success', 'Pedido cancelado com sucesso!');
    }

    public function meusPedidos()
    {
        $pedidos = Pedido::where('user_id', auth()->id())->latest()->get();
        return view('pedidos', ['pedidos' => $pedidos]);
    }

    public function pedidoDetalhes($id)
    {
        $pedido = Pedido::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $itens = PedidoItem::where('pedido_id', $pedido->id)->get();
        return view('pedido-detalhes', ['pedido' => $pedido, 'itens' => $itens]);
    }
}
