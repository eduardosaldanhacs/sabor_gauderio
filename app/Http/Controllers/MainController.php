<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Pizza;


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
}
