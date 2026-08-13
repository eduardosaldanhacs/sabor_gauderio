@props(['pizzas' => collect()])
<header class="site-header">
    <div class="site-header-accent" aria-hidden="true"></div>
    <nav class="navbar navbar-expand-lg site-navbar" aria-label="Navegação principal">
        <div class="container-fluid site-navbar-inner">
            <a class="site-brand" href="{{ route('index') }}" aria-label="Sabor Gaudério — início">
                <img src="{{ asset('assets/images/sabor-gauderio-logo-v2.png') }}" alt="Sabor Gaudério">
            </a>
            <button class="navbar-toggler site-menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#siteNavigation" aria-controls="siteNavigation" aria-expanded="false" aria-label="Abrir menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="siteNavigation">
                <ul class="navbar-nav site-main-nav mx-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->routeIs('cardapio', 'detalhe') ? 'active' : '' }}" href="{{ route('cardapio') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-pizza-slice"></i> Cardápio</a>
                        <ul class="dropdown-menu site-menu-dropdown">
                            <li><a class="dropdown-item site-menu-all" href="{{ route('cardapio') }}">Ver cardápio completo <i class="fa-solid fa-arrow-right"></i></a></li>
                            @foreach ($pizzas->take(6) as $pizza)
                                <li><a class="dropdown-item" href="{{ route('detalhe', ['id' => $pizza->id]) }}">{{ $pizza->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('sobre-nos') ? 'active' : '' }}" href="{{ route('sobre-nos') }}"><i class="fa-solid fa-circle-info"></i> Sobre nós</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contato"><i class="fa-solid fa-phone"></i> Contato</a></li>
                </ul>
                <div class="site-header-actions">
                    @livewire('carrinho')
                    @guest
                        <a href="{{ route('login') }}" class="site-login-button"><i class="fa-solid fa-arrow-right-to-bracket"></i> Entrar</a>
                    @endguest
                    @auth
                        <a href="{{ route('home') }}" class="site-account-button"><i class="fa-solid fa-user"></i> Minha conta</a>
                        <a href="{{ route('logout') }}" class="site-logout-link" aria-label="Sair"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <div class="site-header-rule" aria-hidden="true"></div>
</header>
