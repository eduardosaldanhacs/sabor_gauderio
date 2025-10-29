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
    

    public function toggleCarrinho()
    {
        $this->mostrarCarrinho = !$this->mostrarCarrinho;

        if ($this->mostrarCarrinho) {
            $this->carrinho = session()->get('carrinho', []);
        }
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