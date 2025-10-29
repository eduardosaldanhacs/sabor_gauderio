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

        $carrinho = session('cart', []);
        $cep = $request->query('cep'); // se veio pela URL
        // ou
        // $cep = $request->cep;

        return view('checkout', compact('cep'));
    }
}
