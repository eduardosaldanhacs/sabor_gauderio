<x-layouts.site-layout :pageTitle="'Início - Pizzaria Delícia'">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Cardápio</h1>
        <div class="row py-5">
            <div class="col-4">
                <img src="{{ asset('assets/images/pizzas/' . $pizza->image) }}" class="card-img-top" style="height: 400px"
                    alt="{{ $pizza->name }}">
            </div>
            <div class="col-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $pizza->name }}</h5>
                    <p class="card-text" style="height: 80px">{{ Str::limit($pizza->flavor, 120) }}</p>
                    <p class="card-text">Preço: R$ {{ number_format($pizza->small_price, 2, ',', '.') }}</p>
                    <!-- Botão para adicionar pizza ao carrinho -->
                    @livewire('add-pizza', ['pizza' => $pizza], key($pizza->id))
                </div>
            </div>
        </div>
    </div>
</x-layouts.site-layout>
