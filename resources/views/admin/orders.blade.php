<x-layouts.admin-layout pageTitle="Pedidos">
    <div class="admin-page-heading"><div><p class="eyebrow">Operação</p><h1>Pedidos</h1><p>Controle a fila do balcão à entrega.</p></div></div>
    <div class="filter-chips">
        <a class="{{ request('status') ? '' : 'active' }}" href="{{ route('admin.orders') }}">Todos</a>
        @foreach (['pendente' => 'Novos', 'preparando' => 'Em preparo', 'enviado' => 'Em entrega', 'finalizado' => 'Finalizados'] as $value => $label)<a class="{{ request('status') === $value ? 'active' : '' }}" href="{{ route('admin.orders', ['status' => $value]) }}">{{ $label }}</a>@endforeach
    </div>
    <section class="admin-panel">
        <div class="admin-table-wrap"><table class="admin-table"><thead><tr><th>Pedido</th><th>Cliente / canal</th><th>Entrega</th><th>Pagamento</th><th>Total</th><th>Status</th></tr></thead><tbody>
        @forelse ($orders as $order)
            <tr><td><strong>#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</strong><small class="table-sub">{{ $order->created_at->format('d/m • H:i') }}</small></td><td>{{ $order->user?->username ?? 'Cliente' }}<small class="table-sub">{{ ucfirst($order->channel ?? 'site') }}</small></td><td>{{ $order->cep }}<small class="table-sub">{{ $order->items->sum('quantidade') }} item(ns)</small></td><td>{{ ucfirst($order->payment_method ?? 'A definir') }}<small class="table-sub">{{ ucfirst($order->payment_status ?? 'pendente') }}</small></td><td><strong>R$ {{ number_format($order->total, 2, ',', '.') }}</strong></td><td><form method="POST" action="{{ route('admin.orders.status', $order) }}">@csrf @method('PATCH')<select class="status-select status-{{ $order->status }}" name="status" onchange="this.form.submit()">@foreach (['pendente', 'preparando', 'enviado', 'finalizado'] as $status)<option value="{{ $status }}" @selected($order->status === $status)>{{ ucfirst($status) }}</option>@endforeach</select></form></td></tr>
        @empty<tr><td colspan="6" class="empty-cell">Nenhum pedido neste filtro.</td></tr>@endforelse
        </tbody></table></div>
        <div class="admin-pagination">{{ $orders->links() }}</div>
    </section>
</x-layouts.admin-layout>
