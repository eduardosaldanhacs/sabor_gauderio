<x-layouts.dashboard-layout pageTitle="Home">

    <main class="customer-area">
        <div class="container py-5">
            <div class="customer-welcome">
                <div><p class="eyebrow">Área do cliente</p><h1>Buenas, {{ Auth::user()->username }}!</h1><p>Acompanhe seus pedidos ou escolha o próximo sabor da rodada.</p></div>
                <a class="btn-rustic" href="{{ route('cardapio') }}"><i class="fa-solid fa-pizza-slice"></i> Pedir uma pizza</a>
            </div>
            @if (session('success'))<div class="alert admin-alert mt-4">{{ session('success') }}</div>@endif
            <div class="customer-action-grid">
                <a href="{{ route('pedidos') }}"><i class="fa-solid fa-receipt"></i><span><strong>Meus pedidos</strong><small>Veja o andamento e o histórico</small></span><i class="fa-solid fa-arrow-right"></i></a>
                <a href="{{ route('profile') }}"><i class="fa-solid fa-user-pen"></i><span><strong>Meu cadastro</strong><small>Atualize seus dados e senha</small></span><i class="fa-solid fa-arrow-right"></i></a>
                @if (Auth::user()->is_admin)<a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-gauge-high"></i><span><strong>Administração</strong><small>Gerencie a operação da pizzaria</small></span><i class="fa-solid fa-arrow-right"></i></a>@endif
            </div>
        </div>
    </main>

</x-layouts.dashboard-layout>
