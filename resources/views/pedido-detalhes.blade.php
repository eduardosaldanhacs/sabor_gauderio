<x-layouts.dashboard-layout pageTitle="Detalhes do Pedido">
    <div class="container-fluid mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col py-5">
                <p class="text-center display-6">Detalhes do pedido #{{ $pedido->id }}</p>
            </div>
            <div class="col-12 text-center">
                <p class="m-1">Preço Total: R$ {{ number_format($pedido->total, 2, ',', '.') }}</p>
                <p class="m-1">Status: {{ $pedido->status }}</p>
                <p class="m-1">CEP: {{ $pedido->cep }}</p>
                <div class="row justify-content-center">
                    @foreach ($itens as $item)
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="border p-3 text-center h-100">
                                <p class="m-0">Tamanho: {{ $item->tamanho }}</p>
                                <p class="m-0">Quantidade: {{ $item->quantidade }}</p>
                                <p class="m-0">Preço unitário: R$
                                    {{ number_format($item->preco_unitario, 2, ',', '.') }}</p>
                                <p class="m-0 fw-bold">Subtotal: R$ {{ number_format($item->subtotal, 2, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-layouts.dashboard-layout>
