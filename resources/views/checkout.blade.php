<x-layouts.site-layout pageTitle="Checkout">

    <div class="container my-5">
        <h3>Resumo do Pedido</h3>

        <form action="{{ route('finalizar_pedido') }}" method="get">
            <div class="col-6">
                @foreach ($carrinho as $item)
                    <div class="d-flex mb-3 border-bottom pb-2">
                        <div class="col-4">
                            <img src="{{ asset('assets/images/pizzas/' . $item['image']) }}"
                                class="img-fluid" style="height: 150px" alt="{{ $item['name'] }}">
                        </div>
                        <div class="col-6">
                            <p class="m-0 fw-bold">{{ $item['name'] }}</p>
                            <p class="m-0">Quantidade: {{ $item['quantidade'] }}</p>
                            <p class="m-0">Preço unitário: R$ {{ number_format($item['small_price'], 2, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <p class="fw-bold mt-3">Total: R$ {{ number_format($total, 2, ',', '.') }}</p>
            @if ($cep)
                <p>CEP informado: {{ $cep }}</p>
            @endif
            <input type="submit" value="Finalizar Pedido" class="btn btn-outline-success">
        </form>
    </div>
</x-layouts.site-layout>
