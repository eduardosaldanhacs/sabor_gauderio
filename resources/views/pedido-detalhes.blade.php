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
                @while ($itens->count() > 0)
                    <div class="d-flex mb-3 border-bottom pb-2 justify-content-center">
                        <div class="col-4">
                            <img src="{{ asset('assets/images/pizzas/' . $itens->first()->image) }}"
                                class="img-fluid" style="height: 150px" alt="{{ $itens->first()->name }}">
                        </div>
                        <div class="col-6 text-start">
                            <p class="m-0 fw-bold">{{ $itens->first()->name }}</p>
                            <p class="m-0">Quantidade: {{ $itens->first()->quantidade }}</p>
                            <p class="m-0">Preço unitário: R$ {{ number_format($itens->first()->preco_unitario, 2, ',', '.') }}</p>
                            <p class="m-0">Subtotal: R$ {{ number_format($itens->first()->subtotal, 2, ',', '.') }}</p>
                        </div>
                    </div>
                    @php
                        $itens->shift();
                    @endphp 
                @endwhile
            </div>
        </div>
    </div>

</x-layouts.dashboard-layout>
