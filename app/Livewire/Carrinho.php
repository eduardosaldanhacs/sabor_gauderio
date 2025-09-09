<?php

namespace App\Livewire;

use App\Models\Pizza;
use Livewire\Component;
use Livewire\Attributes\On;

class Carrinho extends Component
{
    public bool $mostrarCarrinho = false;
    public array $carrinho = [];

    #[On('pizzaAdded')]
    public function atualizarCarrinho(array $carrinho)
    {
        // O carrinho já vem como argumento do evento
        $this->carrinho = $carrinho;
    }

    public function limparCarrinho()
    {
        session()->forget('carrinho');
        $this->carrinho = [];
        $this->dispatch('notification', type: 'success', title: 'Carrinho limpo!');
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
        $this->carrinho = session()->get('carrinho', []);
    }

    public function render()
    {
        return view('livewire.carrinho');
    }
}