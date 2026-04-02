<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\Movement;
use App\Models\Package;
use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;
use Illuminate\Support\Number;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    // protected static ?string $pollingInterval = '30s';

    protected function getStats(): array
    {
        // ── Balance ──────────────────────────────────────────────────────────
        $totalIn = Transaction::query()
            ->where('status', 2) // 2 = completed
            ->where('type', 1)   // 1 = deposit (adjust if needed)
            ->sum('amount');

        $totalOut = 0; // adjust once you confirm withdrawal type

        $totalBalance = $totalIn - $totalOut;

        $previousIn = Transaction::query()
            ->where('status', 2)
            ->where('type', 1)
            ->where('created_at', '<', now()->startOfMonth())
            ->sum('amount');

        $previousBalance = $previousIn;

        $balanceDiff  = $totalBalance - $previousBalance;
        $balanceTrend = $balanceDiff >= 0 ? 'success' : 'danger';
        $balanceIcon  = $balanceDiff >= 0
            ? 'heroicon-m-arrow-trending-up'
            : 'heroicon-m-arrow-trending-down';

        $balanceChart = $this->chartByMonth(
            Transaction::query()
                ->where('status', 2)
                ->where('type', 1)
                ->selectRaw('MONTH(created_at) as month, SUM(amount) as total')
                ->where('created_at', '>=', now()->subMonths(6))
                ->groupByRaw('MONTH(created_at)')
                ->orderByRaw('MONTH(created_at)')
                ->pluck('total', 'month')
        );

        // ── Movements ────────────────────────────────────────────────────────
        $totalMovements     = Movement::count();
        $movementsThisMonth = Movement::whereMonth('created_at', now()->month)->count();
        $movementsLastMonth = Movement::whereMonth('created_at', now()->subMonth()->month)->count();
        $movementsDiff      = $movementsThisMonth - $movementsLastMonth;

        $movementsChart = $this->chartByDay(
            Movement::query()
                ->selectRaw('DAY(created_at) as day, COUNT(*) as total')
                ->where('created_at', '>=', now()->subDays(7))
                ->groupByRaw('DAY(created_at)')
                ->orderByRaw('DAY(created_at)')
                ->pluck('total', 'day')
        );

        // ── Packages ─────────────────────────────────────────────────────────
        $totalPackages     = Package::count();
        $pendingPackages   = Package::where('status', 0)->count();
        $deliveredPackages = Package::where('status', 2)->count();

        $packagesChart = $this->chartByDay(
            Package::query()
                ->selectRaw('DAY(created_at) as day, COUNT(*) as total')
                ->where('created_at', '>=', now()->subDays(7))
                ->groupByRaw('DAY(created_at)')
                ->orderByRaw('DAY(created_at)')
                ->pluck('total', 'day')
        );

        // ── Articles ─────────────────────────────────────────────────────────
        $totalArticles  = Article::count();
        $activeArticles = Article::where('is_active', true)->count();
        $lowStock       = Article::whereColumn('quantity', '<=', 'min_quantity')->count();

        $articlesChart = $this->chartByDay(
            Article::query()
                ->selectRaw('DAY(created_at) as day, COUNT(*) as total')
                ->where('created_at', '>=', now()->subDays(7))
                ->groupByRaw('DAY(created_at)')
                ->orderByRaw('DAY(created_at)')
                ->pluck('total', 'day')
        );

        // ── Transactions ──────────────────────────────────────────────────────
        $totalTransactions     = Transaction::count();
        $completedTransactions = Transaction::where('status', 2)->count();
        $pendingTransactions   = Transaction::where('status', 1)->count();

        $transactionsChart = $this->chartByDay(
            Transaction::query()
                ->selectRaw('DAY(created_at) as day, COUNT(*) as total')
                ->where('created_at', '>=', now()->subDays(7))
                ->groupByRaw('DAY(created_at)')
                ->orderByRaw('DAY(created_at)')
                ->pluck('total', 'day')
        );

        // ── Stats ─────────────────────────────────────────────────────────────
        return [

            Stat::make(__('Balance'), Number::currency($totalBalance, app('site')->currency))
                ->description(
                    ($balanceDiff >= 0 ? '+' : '') .
                        Number::currency(abs($balanceDiff), app('site')->currency) .
                        ' ' . __('vs last month')
                )
                ->color($balanceTrend)
                ->chart($balanceChart)
                ->icon('heroicon-o-banknotes')
                ->descriptionIcon($balanceIcon),

            Stat::make(__('Movements'), Number::format($totalMovements))
                ->description(
                    __('This month: ') . $movementsThisMonth .
                        ' (' . ($movementsDiff >= 0 ? '+' : '') . $movementsDiff . ' ' . __('vs last month') . ')'
                )
                ->color($movementsDiff >= 0 ? 'success' : 'warning')
                ->chart($movementsChart)
                ->icon('heroicon-o-arrows-up-down')
                ->descriptionIcon(
                    $movementsDiff >= 0
                        ? 'heroicon-m-arrow-trending-up'
                        : 'heroicon-m-arrow-trending-down'
                ),

            Stat::make(__('Packages'), Number::format($totalPackages))
                ->description(
                    __('Pending: ') . $pendingPackages .
                        ' · ' . __('Delivered: ') . $deliveredPackages
                )
                ->color($pendingPackages > 0 ? 'warning' : 'success')
                ->chart($packagesChart)
                ->icon('heroicon-o-cube')
                ->descriptionIcon('heroicon-m-archive-box'),

            Stat::make(__('Articles'), Number::format($totalArticles))
                ->description(
                    __('Active: ') . $activeArticles .
                        ($lowStock > 0 ? ' · ⚠ ' . __('Low stock: ') . $lowStock : '')
                )
                ->color($lowStock > 0 ? 'danger' : 'success')
                ->chart($articlesChart)
                ->icon('heroicon-o-squares-2x2')
                ->descriptionIcon('heroicon-m-tag'),

            Stat::make(__('Transactions'), Number::format($totalTransactions))
                ->description(
                    __('Completed: ') . $completedTransactions .
                        ' · ' . __('Pending: ') . $pendingTransactions
                )
                ->color($pendingTransactions > 0 ? 'warning' : 'success')
                ->chart($transactionsChart)
                ->icon('heroicon-o-arrow-path-rounded-square')
                ->descriptionIcon('heroicon-m-banknotes'),
        ];
    }

    /**
     * Build a 7-point chart from day-keyed totals (last 7 days).
     */
    private function chartByDay(\Illuminate\Support\Collection $data): array
    {
        return collect(range(0, 6))
            ->map(fn($i) => (int) ($data[now()->subDays(6 - $i)->day] ?? 0))
            ->toArray();
    }

    /**
     * Build a 6-point chart from month-keyed totals (last 6 months).
     */
    private function chartByMonth(\Illuminate\Support\Collection $data): array
    {
        return collect(range(0, 5))
            ->map(fn($i) => (float) ($data[now()->subMonths(5 - $i)->month] ?? 0))
            ->toArray();
    }
}
