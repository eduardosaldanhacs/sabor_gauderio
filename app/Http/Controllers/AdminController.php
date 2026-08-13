<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Pizza;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        $todayOrders = Pedido::whereDate('created_at', today());
        $todayRevenue = (clone $todayOrders)->where('status', '!=', 'cancelado')->sum('total');
        $orders = Pedido::with('user')->latest()->take(8)->get();
        $statusCounts = Pedido::selectRaw('status, count(*) as total')->groupBy('status')->pluck('total', 'status');

        return view('admin.dashboard', [
            'todayOrders' => (clone $todayOrders)->count(),
            'todayRevenue' => $todayRevenue,
            'averageTicket' => (clone $todayOrders)->count() ? $todayRevenue / (clone $todayOrders)->count() : 0,
            'activeCustomers' => User::where('active', true)->count(),
            'orders' => $orders,
            'statusCounts' => $statusCounts,
            'unavailablePizzas' => Pizza::where('available', false)->count(),
        ]);
    }

    public function orders(Request $request): View
    {
        $orders = Pedido::with(['user', 'items'])
            ->when($request->filled('status'), fn ($query) => $query->where('status', $request->status))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.orders', compact('orders'));
    }

    public function updateOrderStatus(Request $request, Pedido $pedido): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'in:pendente,preparando,enviado,finalizado'],
        ]);

        $pedido->update($data);

        return back()->with('success', "Pedido #{$pedido->id} atualizado.");
    }

    public function menu(): View
    {
        return view('admin.menu', ['pizzas' => Pizza::orderBy('category')->orderBy('name')->get()]);
    }

    public function storePizza(Request $request): RedirectResponse
    {
        $data = $this->validatePizza($request);
        $data['available'] = $request->boolean('available');
        $data['featured'] = $request->boolean('featured');
        Pizza::create($data);

        return back()->with('success', 'Pizza adicionada ao cardápio.');
    }

    public function updatePizza(Request $request, Pizza $pizza): RedirectResponse
    {
        $data = $this->validatePizza($request);
        $data['available'] = $request->boolean('available');
        $data['featured'] = $request->boolean('featured');
        $pizza->update($data);

        return back()->with('success', 'Item do cardápio atualizado.');
    }

    public function section(string $section): View
    {
        $sections = [
            'estoque' => ['Estoque', 'Acompanhe insumos, níveis mínimos e perdas.', 'fa-boxes-stacked'],
            'clientes' => ['Clientes', 'Histórico, preferências e recorrência.', 'fa-users'],
            'entregas' => ['Entregas', 'Organize rotas, bairros e tempos de entrega.', 'fa-motorcycle'],
            'financeiro' => ['Financeiro', 'Fechamento de caixa, taxas e formas de pagamento.', 'fa-wallet'],
            'relatorios' => ['Relatórios', 'Vendas, sabores mais pedidos e desempenho.', 'fa-chart-line'],
            'configuracoes' => ['Configurações', 'Horários, taxas, áreas atendidas e equipe.', 'fa-gear'],
        ];

        abort_unless(isset($sections[$section]), 404);

        return view('admin.section', ['section' => $section, 'meta' => $sections[$section]]);
    }

    private function validatePizza(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'category' => ['required', 'string', 'max:60'],
            'flavor' => ['required', 'string'],
            'image' => ['nullable', 'string', 'max:255'],
            'prep_time' => ['required', 'integer', 'min:5', 'max:180'],
            'small_price' => ['nullable', 'numeric', 'min:0'],
            'medium_price' => ['nullable', 'numeric', 'min:0'],
            'large_price' => ['nullable', 'numeric', 'min:0'],
        ]);
    }
}
