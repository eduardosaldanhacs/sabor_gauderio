@props(['pizzas'])
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
        <div class="col-3"><a class="navbar-brand" href="{{ route('index') }}"><img class="img-fluid"
                    src="{{ asset('assets/images/sabor_gauderio.png') }}" alt="" style="height: 80px"></a></div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="col-9 collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <div class="dropdown">
                    <li class="nav-item" id="cardapio-dropdown">
                        <a class="text-white nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-pizza-slice me-1"></i>
                            <span onclick="window.location.href='{{ route('cardapio') }}'" id="cardapio-menu">Cardápio</span>
                        </a>
                        <ul class="dropdown-menu" id="menu-cardapio">
                            @foreach ($pizzas as $pizza)
                                <li>
                                    <a class="dropdown-item text-white" type="button" href="{{ route('detalhe', ['id' => $pizza->id]) }}">
                                        {{ $pizza->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        {{-- <a class="nav-link text-white" href="{{ route('cardapio') }}"><i
                                class="fas fa-pizza-slice me-1"></i>Cardápio</a> --}}
                    </li>
                </div>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('sobre-nos') }}"><i
                            class="fas fa-info-circle me-1"></i>Sobre
                        Nós</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#contato"><i class="fas fa-phone-alt me-1"></i>Contato</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('home') }}"><i class="fas fa-receipt me-1"></i>Meus
                            Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('home') }}"><i
                                class="fas fa-user-circle me-1"></i>Perfil</a>
                    </li>
                @endauth
            </ul>
            <div class="d-flex">

                {{-- <a href="{{ route('login') }}" class="btn btn-outline-light me-2">
                    <i class="fas fa-shopping-cart me-1"></i> Carrinho
                </a> --}}
                @livewire('carrinho')
                @guest
                    <a href="{{ route('login') }}" class="btn btn-warning">
                        <i class="fas fa-sign-in-alt me-1"></i> Entrar
                    </a>
                @endguest
                @auth
                    <a href="{{ route('home') }}" class="btn btn-info me-1">
                        <i class="fas fa-sign-out-alt me-1"></i> Área do Cliente
                    </a>
                    <a href="{{ route('logout') }}" class="btn btn-danger">
                        <i class="fas fa-sign-out-alt me-1"></i> Sair
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
