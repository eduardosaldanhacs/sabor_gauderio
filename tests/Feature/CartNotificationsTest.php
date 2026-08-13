<?php

namespace Tests\Feature;

use App\Livewire\Carrinho;
use App\Livewire\Message;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartNotificationsTest extends TestCase
{
    use RefreshDatabase;

    public function test_clearing_cart_dispatches_notification_and_empties_session(): void
    {
        session()->put('carrinho', [1 => [
            'id' => 1,
            'name' => 'Pizza teste',
            'small_price' => 30,
            'quantidade' => 1,
            'image' => 'pizza.jpg',
        ]]);

        Livewire::test(Carrinho::class)
            ->call('limparCarrinho')
            ->assertSet('carrinho', [])
            ->assertDispatched('notification', type: 'success', title: 'Carrinho limpo!');

        $this->assertFalse(session()->has('carrinho'));
    }

    public function test_removing_product_dispatches_notification_and_updates_cart(): void
    {
        session()->put('carrinho', [7 => [
            'id' => 7,
            'name' => 'Campeira',
            'small_price' => 42,
            'quantidade' => 1,
            'image' => 'campeira.jpg',
        ]]);

        Livewire::test(Carrinho::class)
            ->call('removerProduto', 7)
            ->assertSet('carrinho', [])
            ->assertDispatched('notification', type: 'success', title: 'Campeira removida do carrinho.');

        $this->assertSame([], session()->get('carrinho'));
    }

    public function test_each_notification_changes_the_timer_version(): void
    {
        Livewire::test(Message::class)
            ->dispatch('notification', type: 'success', title: 'Primeira')
            ->assertSet('notificationId', 1)
            ->dispatch('notification', type: 'success', title: 'Segunda')
            ->assertSet('notificationId', 2)
            ->assertSet('show', true);
    }
}
