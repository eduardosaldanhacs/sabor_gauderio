<x-layouts.admin-layout pageTitle="Visão geral">
    <div class="admin-page-heading">
        <div><p class="eyebrow">Resumo de hoje</p><h1>Buenas, {{ Auth::user()->display_name }}!</h1><p>Acompanhe o movimento da casa e o que precisa da sua atenção.</p></div>
        <a href="{{ route('admin.orders') }}" class="btn-rustic"><i class="fa-solid fa-plus"></i> Novo pedido</a>
    </div>

    <section class="admin-metrics">
        <article class="metric-card"><div class="metric-icon amber"><i class="fa-solid fa-receipt"></i></div><span>Pedidos hoje</span><strong>{{ $todayOrders }}</strong><small><i class="fa-solid fa-arrow-trend-up"></i> movimento do dia</small></article>
        <article class="metric-card"><div class="metric-icon green"><i class="fa-solid fa-sack-dollar"></i></div><span>Faturamento</span><strong>R$ {{ number_format($todayRevenue, 2, ',', '.') }}</strong><small>vendas confirmadas</small></article>
        <article class="metric-card"><div class="metric-icon red"><i class="fa-solid fa-chart-simple"></i></div><span>Ticket médio</span><strong>R$ {{ number_format($averageTicket, 2, ',', '.') }}</strong><small>por pedido</small></article>
        <article class="metric-card"><div class="metric-icon brown"><i class="fa-solid fa-users"></i></div><span>Clientes ativos</span><strong>{{ $activeCustomers }}</strong><small>na base da casa</small></article>
    </section>

    <div class="admin-grid-main">
        <section class="admin-panel">
            <div class="panel-heading"><div><h2>Pedidos recentes</h2><p>Atualizações da operação em tempo real</p></div><a href="{{ route('admin.orders') }}">Ver todos <i class="fa-solid fa-arrow-right"></i></a></div>
            <div class="admin-table-wrap">
                <table class="admin-table">
                    <thead><tr><th>Pedido</th><th>Cliente</th><th>Horário</th><th>Total</th><th>Status</th></tr></thead>
                    <tbody>
                    @forelse ($orders as $order)
                        <tr><td><strong>#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</strong></td><td>{{ $order->user?->display_name ?? 'Balcão' }}</td><td>{{ $order->created_at->format('H:i') }}</td><td>R$ {{ number_format($order->total, 2, ',', '.') }}</td><td><span class="status-pill status-{{ $order->status }}">{{ ucfirst($order->status) }}</span></td></tr>
                    @empty
                        <tr><td colspan="5" class="empty-cell">Nenhum pedido registrado ainda.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <aside class="admin-panel kitchen-panel">
            <div class="panel-heading"><div><h2>Ritmo da cozinha</h2><p>Fila atual por etapa</p></div></div>
            @foreach (['pendente' => ['Novos pedidos', 'fa-bell'], 'preparando' => ['Em preparo', 'fa-fire-burner'], 'enviado' => ['Em entrega', 'fa-motorcycle'], 'finalizado' => ['Finalizados', 'fa-circle-check']] as $status => [$label, $icon])
                <div class="kitchen-row"><span class="kitchen-icon"><i class="fa-solid {{ $icon }}"></i></span><div><strong>{{ $label }}</strong><small>{{ $status === 'preparando' ? 'Atenção ao tempo de forno' : 'Atualizado agora' }}</small></div><b>{{ $statusCounts[$status] ?? 0 }}</b></div>
            @endforeach
            @if ($unavailablePizzas)
                <a class="stock-warning" href="{{ route('admin.menu') }}"><i class="fa-solid fa-triangle-exclamation"></i><span><strong>{{ $unavailablePizzas }} itens indisponíveis</strong><small>Revise o cardápio</small></span><i class="fa-solid fa-chevron-right"></i></a>
            @endif
        </aside>
    </div>

    <section class="quick-actions"><h2>Acesso rápido</h2><div><a href="{{ route('admin.orders') }}"><i class="fa-solid fa-cash-register"></i><span><strong>Lançar pedido</strong><small>Balcão ou telefone</small></span></a><a href="{{ route('admin.menu') }}"><i class="fa-solid fa-pizza-slice"></i><span><strong>Editar cardápio</strong><small>Preços e disponibilidade</small></span></a><a href="{{ route('admin.section', 'estoque') }}"><i class="fa-solid fa-box-open"></i><span><strong>Conferir estoque</strong><small>Insumos abaixo do mínimo</small></span></a><a href="{{ route('admin.section', 'financeiro') }}"><i class="fa-solid fa-file-invoice-dollar"></i><span><strong>Fechar caixa</strong><small>Resumo do turno</small></span></a></div></section>
</x-layouts.admin-layout>
