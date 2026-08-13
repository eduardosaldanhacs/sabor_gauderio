<x-layouts.admin-layout :pageTitle="$meta[0]">
    <div class="admin-page-heading"><div><p class="eyebrow">Gestão</p><h1>{{ $meta[0] }}</h1><p>{{ $meta[1] }}</p></div></div>
    <section class="admin-panel module-intro"><div class="module-icon"><i class="fa-solid {{ $meta[2] }}"></i></div><div><h2>Módulo preparado para a operação</h2><p>Esta área já faz parte da nova navegação administrativa e está pronta para receber os dados específicos da pizzaria.</p></div></section>
    <div class="module-cards">
        @if ($section === 'estoque')
            <article><span>Itens críticos</span><strong>0</strong><small>abaixo do estoque mínimo</small></article><article><span>Próxima conferência</span><strong>Hoje</strong><small>ao fechar o turno</small></article><article><span>Perdas no mês</span><strong>R$ 0,00</strong><small>registre descartes e sobras</small></article>
        @elseif ($section === 'financeiro')
            <article><span>Caixa do turno</span><strong>Aberto</strong><small>acompanhe entradas e saídas</small></article><article><span>Taxas de entrega</span><strong>R$ 0,00</strong><small>total de hoje</small></article><article><span>Pagamentos pendentes</span><strong>0</strong><small>aguardando confirmação</small></article>
        @else
            <article><span>Visão do dia</span><strong>—</strong><small>os indicadores aparecerão aqui</small></article><article><span>Pendências</span><strong>0</strong><small>nenhuma atenção necessária</small></article><article><span>Última atualização</span><strong>Agora</strong><small>dados sincronizados</small></article>
        @endif
    </div>
</x-layouts.admin-layout>
