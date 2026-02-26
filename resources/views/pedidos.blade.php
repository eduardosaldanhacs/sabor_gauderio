<x-layouts.dashboard-layout pageTitle="Pedidos">

    <div class="container-fluid mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col py-5">
                <p class="text-center display-6">Meus Pedidos</p>
            </div>
            <div class="col-12">
                <div class="row justify-content-center align-items-center">
                    @foreach ($pedidos as $pedido)
                        <div class="col-10 card mb-4 bg-light">
                            <div class="card-body text-center">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-5 text-center">
                                        <a href="{{ route('pedido_detalhes', ['id' => $pedido->id]) }}"
                                            class="text-decoration-none text-dark">
                                            <h5 class="card-title">Pedido #{{ $pedido->id }}</h5>
                                        </a>
                                        <p class="card-text m-1">Preço: R$
                                            {{ number_format($pedido->total, 2, ',', '.') }}
                                        </p>
                                        <p class="card-text m-1">Status: {{ $pedido->status }}</p>
                                        <p class="card-text m-1">CEP: {{ $pedido->cep }}</p>
                                        <p>Pedido realizado em: {{ $pedido->created_at->format('d/m/Y') }}</p>
                                    </div>
                                    <div class="col-5 text-center d-flex flex-column justify-content-center align-items-center">
                                            <div class="col-6 text-center">
                                                <form action="{{ route('cancelarPedido', ['id' => $pedido->id]) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger w-100">Cancelar
                                                        Pedido</button>
                                                </form>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <form action="{{ route('pedido_detalhes', ['id' => $pedido->id]) }}"
                                                    method="GET" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary w-100">Visualizar
                                                        Pedido</button>
                                                </form>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-layouts.dashboard-layout>
