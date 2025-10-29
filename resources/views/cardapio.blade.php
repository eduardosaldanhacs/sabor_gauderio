<x-layouts.site-layout :pageTitle="'Início - Pizzaria Delícia'">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Cardápio</h1>
        <div class="row">
            @foreach ($pizzas as $pizza)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('assets/images/pizzas/' . $pizza->image) }}" class="card-img-top" style="height: 400px" alt="{{ $pizza->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pizza->name }}</h5>
                            <p class="card-text" style="height: 80px">{{ Str::limit($pizza->flavor, 120) }}</p>
                            <p class="card-text">Preço: R$ {{ number_format($pizza->small_price, 2, ',', '.') }}</p>
                            <!-- Botão para adicionar pizza ao carrinho -->
                            @livewire('add-pizza', ['pizza' => $pizza], key($pizza->id))
                        </div>
                    </div>
                </div>
            @endforeach
        </div>         
    </div>  
</x-layouts.site-layout>
