<?php

namespace App\Livewire;

use App\Models\Pizza;
use Livewire\Component;
use Livewire\Attributes\On;

class Carrinho extends Component
{
    public bool $mostrarCarrinho = false;
    public array $carrinho = [];
    public $cep;

    #[On('pizzaAdded')]
    public function atualizarCarrinho()
    {
        $this->carrinho = session()->get('carrinho', []);
    }


    public function limparCarrinho()
    {
        session()->forget('carrinho');
        $this->carrinho = [];
        $this->dispatch('notification', type: 'success', title: 'Carrinho limpo!');
    }

    public function finalizarCompra()
    {
        if (!$this->cep) {
            $this->dispatch('notification', type: 'error', title: 'Digite o CEP antes de finalizar!');
            return;
        }

        // redireciona para a rota checkout com o CEP
        return redirect()->route('checkout', ['cep' => $this->cep]);
    }

    public function toggleCarrinho()
    {
        $this->mostrarCarrinho = !$this->mostrarCarrinho;
        if ($this->mostrarCarrinho) {
            $this->carrinho = session()->get('carrinho', []);
        }
    }

    public function getTotalProperty(): float
    {
        return array_reduce($this->carrinho, function ($carry, $item) {
            return $carry + ($item['small_price'] * $item['quantidade']);
        }, 0);
    }

    public function mount()
    {
        //dump(session()->get('carrinho'));
        $this->carrinho = session()->get('carrinho', []);
    }

    public function render()
    {
        return view('livewire.carrinho');
    }
}
