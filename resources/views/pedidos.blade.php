<x-layouts.dashboard-layout pageTitle="Pedidos">

    <div class="container-fluid mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col py-5">
                <p class="text-center display-6">Meus Pedidos</p>
            </div>
            <div class="col-12">
                <div class="row">
                    @foreach ($pedidos as $pedido)
                        <div class="mb-5 col-4">
                            <div class="card-body text-center">
                                <h5 class="card-title">Pedido #{{ $pedido->id }}</h5>
                                <p class="card-text">Preço: R$ {{ number_format($pedido->total, 2, ',', '.') }}</p>
                                <p class="card-text">Status: {{ $pedido->status }}</p>
                                <p class="card-text">Endereço: {{ $pedido->cep }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-layouts.dashboard-layout>
