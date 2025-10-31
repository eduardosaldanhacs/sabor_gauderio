<div>
    <button wire:click="toggleCarrinho" class="btn btn-outline-light me-2">
        <i class="fas fa-shopping-cart me-1"></i> Carrinho
    </button>

    @if ($mostrarCarrinho)
        <div class="card mt-3 me-3 p-3 position-absolute z-3">
            <h5>Itens no carrinho:</h5>

            @forelse ($carrinho as $item)
                <div class="row mb-2">
                    <div class="col-5">
                        <img src="{{ asset('assets/images/pizzas/' . $item['image']) }}" class="card-img-top"
                            style="height: 80px" alt="{{ $item['name'] }}">
                    </div>
                    <div class="col-7">
                        <p class="m-0 text-capitalize">Pizza: {{ $item['name'] }}</p>
                        <p class="m-0 text-capitalize">Preço: R$ {{ number_format($item['small_price'], 2, ',', '.') }}
                        </p>
                        <p class="mb-2 text-capitalize">Quantidade: {{ $item['quantidade'] }}</p>
                    </div>
                </div>
            @empty
                <p>Carrinho vazio.</p>
            @endforelse

            @if ($carrinho)
                <form wire:submit.prevent="finalizarCompra">
                    @csrf
                    <div class="mt-2">
                        <label for="cep" class="form-label">Cep: </label>
                        <input type="text" id="cep" wire:model="cep" class="form-control"
                            placeholder="Digite seu cep">
                    </div>
                    <p class="mt-2 fw-bold">Total: R$ {{ number_format($this->total, 2, ',', '.') }}</p>
                    <a wire:click="limparCarrinho" class="btn btn-outline-danger">Limpar Carrinho</a>
                    <input type="submit" class="btn btn-outline-success mt-2" value="Finalizar Compra">                   
                </form>
            @endif
        </div>
    @endif
</div>
