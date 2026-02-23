<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Pizza;
use App\Models\Pedido;
use App\Models\PedidoItem;


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
        // Aqui você pode implementar a lógica para finalizar o pedido,
        $carrinho = session()->get('carrinho', []);
        $cep = session()->get('cep');

        Pedido::create([
            'user_id' => auth()->id(),
            'total' => collect($carrinho)->sum(function ($item) {
                return $item['small_price'] * $item['quantidade'];
            }),
            'status' => 'pendente',
            'cep' => $cep,
        ]);
        foreach ($carrinho as $item) {
            PedidoItem::create([
                'pedido_id' => Pedido::latest()->first()->id,
                'pizza_id' => 1,
                'tamanho' => 'M',
                'quantidade' => $item['quantidade'],
                'preco_unitario' => $item['small_price'],
                'subtotal' => $item['small_price'] * $item['quantidade'],
            ]);
        }
        // como salvar os dados no banco, enviar e-mail de confirmação, etc.

        // Para este exemplo, vamos apenas limpar o carrinho e redirecionar para a home
        session()->forget('carrinho');
        return redirect()->route('home')->with('success', 'Pedido finalizado com sucesso!');
    }

    public function meusPedidos()
    {
        $pedidos = Pedido::where('user_id', auth()->id())->latest()->get();
        return view('pedidos', ['pedidos' => $pedidos]);
    }
}
