{{-- resources/views/index.blade.php --}}
<x-layouts.site-layout :pageTitle="'Início - Pizzaria Delícia'" :pizzas="$pizzas">
    <x-banner />
    <x-popular-pizzas :pizzas="$pizzas" />
    <x-make-order />
</x-layouts.site-layout>
