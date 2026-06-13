<?php

namespace App\Filament\Widgets;

use App\Models\HealthRecord;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class HealthStatsWidget extends BaseWidget
{
    protected static ?int $sort = 3;

    protected function getStats(): array
    {
        $latest = HealthRecord::orderByDesc('recorded_date')->first();

        // ⚡ Bolt: Use database aggregation instead of in-memory Eloquent collection
        // Expecting ~98% time reduction and >99% memory reduction for large datasets
        $averages = HealthRecord::where('recorded_date', '>=', now()->subDays(7))
            ->selectRaw('AVG(steps) as avg_steps, AVG(sleep_hours) as avg_sleep')
            ->first();

        $avgSteps = $averages?->avg_steps;
        $avgSleep = $averages?->avg_sleep;

        return [
            Stat::make('Steps (7-day avg)', $avgSteps ? number_format($avgSteps) : '—')
                ->description($latest?->recorded_date?->diffForHumans() ?? 'No data yet')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color($avgSteps >= 10000 ? 'success' : ($avgSteps >= 5000 ? 'warning' : 'danger')),

            Stat::make('Sleep (7-day avg)', $avgSleep ? round($avgSleep, 1).' hrs' : '—')
                ->description($avgSleep >= 7 ? 'Well rested' : ($avgSleep >= 6 ? 'Could be better' : 'Get more rest'))
                ->color($avgSleep >= 7 ? 'success' : ($avgSleep >= 6 ? 'warning' : 'danger')),

            Stat::make('Resting HR', $latest?->resting_heart_rate ? $latest->resting_heart_rate.' bpm' : '—')
                ->description('Latest reading')
                ->color($latest?->resting_heart_rate <= 65 ? 'success' : 'warning'),

            Stat::make('Weight', $latest?->weight_lbs ? $latest->weight_lbs.' lbs' : '—')
                ->description('Last logged: '.($latest?->recorded_date?->format('M j') ?? 'never'))
                ->color('primary'),
        ];
    }
}
