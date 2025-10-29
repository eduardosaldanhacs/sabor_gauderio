{{-- resources/views/index.blade.php --}}
<x-layouts.main-layout :pageTitle="'Início - Pizzaria Delícia'">
    <x-banner />
    <x-popular-pizzas :pizzas="$pizzas" />
    <x-make-order />
</x-layouts.main-layout>
