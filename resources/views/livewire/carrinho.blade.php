<div class="site-cart-wrap">
    <button wire:click="toggleCarrinho" class="site-cart-button" type="button">
        <i class="fas fa-shopping-cart"></i> Carrinho
        @if (count($carrinho))<span class="site-cart-count">{{ collect($carrinho)->sum('quantidade') }}</span>@endif
    </button>

    @if ($mostrarCarrinho)
        <div class="card site-cart-panel p-3 position-absolute z-3">
            <h5>Seu carrinho</h5>
            @forelse ($carrinho as $pizzaId => $item)
                <div class="row mb-3 g-2">
                    <div class="col-4"><img src="{{ asset('assets/images/pizzas/' . $item['image']) }}" class="site-cart-thumb" alt="{{ $item['name'] }}"></div>
                    <div class="col-8">
                        <div class="d-flex align-items-start justify-content-between gap-2">
                            <p class="m-0 fw-bold">{{ $item['name'] }}</p>
                            <button wire:click="removerProduto({{ $pizzaId }})"
                                type="button" class="site-cart-remove" aria-label="Remover {{ $item['name'] }} do carrinho">
                                <i class="fa-solid fa-xmark" aria-hidden="true"></i>
                            </button>
                        </div>
                        <p class="m-0">R$ {{ number_format($item['small_price'], 2, ',', '.') }}</p>
                        <small>Quantidade: {{ $item['quantidade'] }}</small>
                    </div>
                </div>
            @empty
                <p class="site-cart-empty">Seu carrinho está vazio.</p>
            @endforelse
            @if ($carrinho)
                <form wire:submit.prevent="finalizarCompra">@csrf
                    <label for="cep" class="form-label">CEP</label>
                    <input type="text" id="cep" wire:model="cep" class="form-control" placeholder="00000-000">
                    <p class="mt-3 fw-bold">Total: R$ {{ number_format($this->total, 2, ',', '.') }}</p>
                    <div class="d-flex gap-2"><button wire:click="limparCarrinho" type="button" class="btn btn-outline-danger btn-sm">Limpar</button><input type="submit" class="btn-rustic flex-grow-1" value="Finalizar pedido"></div>
                </form>
            @endif
        </div>
    @endif
</div>
