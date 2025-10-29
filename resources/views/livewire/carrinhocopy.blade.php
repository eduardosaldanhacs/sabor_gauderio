<div>
    <button wire:click="toggleCarrinho" class="btn btn-outline-light me-2">
        <i class="fas fa-shopping-cart me-1"></i> Carrinho
    </button>

    @if($mostrarCarrinho)
        <div class="card mt-3 p-3 position-absolute">
            <h5>Itens no carrinho:</h5>
            @php
                $total = 0;
            @endphp
            @forelse ($carrinho as $item)
                @php 
                    $total += $item['small_price'];
                @endphp
                <p class="m-0">Pizza: {{ $item['name'] }}</p>
                <p class="m-0">Preço: R$ {{ $item['small_price'] }}</p>
                <p class="mb-2">Quantidade: {{ $item['quantidade']}}</p>
                
            @empty
                <p>Carrinho vazio.</p>
            @endforelse
            @if($carrinho) 
                <p class="m-0">Total: R$ {{ $total }}</p>
                <a wire:click="limparCarrinho" class="btn btn-outline-danger">Limpar Carrinho</a>
           @endif
        </div>
    @endif
</div>