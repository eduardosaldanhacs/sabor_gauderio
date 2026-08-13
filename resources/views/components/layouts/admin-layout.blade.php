<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }} | Sabor Gaudério</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">
</head>
<body class="admin-body">
    <aside class="admin-sidebar" id="adminSidebar">
        <a class="admin-brand" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('assets/images/sabor_gauderio.png') }}" alt="Sabor Gaudério">
            <span><strong>Sabor Gaudério</strong><small>Gestão da estância</small></span>
        </a>
        <nav class="admin-nav" aria-label="Administração">
            <span class="admin-nav-label">Operação</span>
            <a class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-gauge-high"></i> Visão geral</a>
            <a class="{{ request()->routeIs('admin.orders*') ? 'active' : '' }}" href="{{ route('admin.orders') }}"><i class="fa-solid fa-receipt"></i> Pedidos <span class="admin-nav-badge">{{ \App\Models\Pedido::whereIn('status', ['pendente', 'preparando'])->count() }}</span></a>
            <a class="{{ request()->routeIs('admin.menu*') ? 'active' : '' }}" href="{{ route('admin.menu') }}"><i class="fa-solid fa-pizza-slice"></i> Cardápio</a>
            <a class="{{ request('section') === 'estoque' ? 'active' : '' }}" href="{{ route('admin.section', 'estoque') }}"><i class="fa-solid fa-boxes-stacked"></i> Estoque</a>
            <a class="{{ request('section') === 'entregas' ? 'active' : '' }}" href="{{ route('admin.section', 'entregas') }}"><i class="fa-solid fa-motorcycle"></i> Entregas</a>
            <span class="admin-nav-label">Relacionamento</span>
            <a href="{{ route('admin.section', 'clientes') }}"><i class="fa-solid fa-users"></i> Clientes</a>
            <a href="{{ route('admin.section', 'financeiro') }}"><i class="fa-solid fa-wallet"></i> Financeiro</a>
            <a href="{{ route('admin.section', 'relatorios') }}"><i class="fa-solid fa-chart-line"></i> Relatórios</a>
            <span class="admin-nav-label">Sistema</span>
            <a href="{{ route('admin.section', 'configuracoes') }}"><i class="fa-solid fa-gear"></i> Configurações</a>
            <a href="{{ route('index') }}"><i class="fa-solid fa-arrow-up-right-from-square"></i> Ver loja</a>
        </nav>
        <div class="admin-user">
            <span class="admin-avatar">{{ strtoupper(substr(Auth::user()->username, 0, 1)) }}</span>
            <span><strong>{{ Auth::user()->username }}</strong><small>Administrador</small></span>
            <a href="{{ route('logout') }}" aria-label="Sair"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
    </aside>

    <main class="admin-main">
        <header class="admin-topbar">
            <button class="admin-menu-toggle" type="button" onclick="document.getElementById('adminSidebar').classList.toggle('open')" aria-label="Abrir menu"><i class="fa-solid fa-bars"></i></button>
            <div><span class="admin-open-dot"></span> Loja aberta <small>• até 23h30</small></div>
            <div class="admin-top-actions"><span>{{ now()->format('d/m/Y') }}</span><a href="{{ route('admin.orders') }}" class="admin-icon-button"><i class="fa-regular fa-bell"></i></a></div>
        </header>
        <div class="admin-content">
            @if (session('success'))
                <div class="alert admin-alert"><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif
            {{ $slot }}
        </div>
    </main>
    <script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
