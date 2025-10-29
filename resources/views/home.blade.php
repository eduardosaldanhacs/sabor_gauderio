<x-layouts.dashboard-layout pageTitle="Home">

    <div class="container-fluid mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col py-5">
                <p class="text-center display-6">Seja bem vindo a nossa pizzaria {{ Auth::user()->username }}</p>
            </div>
            <div class="col-12 text-center">
                <button class="btn btn-outline-primary">Pedidos</button>
                <form action="{{ route('profile') }}" method="GET">
                    @csrf
                    <button class="btn btn-outline-primary">Meu Cadastro</button>
                </form>
            </div>
        </div>
    </div>

</x-layouts.dashboard-layout>
