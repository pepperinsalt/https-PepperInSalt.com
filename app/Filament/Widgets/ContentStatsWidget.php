<?php

namespace App\Filament\Widgets;

use App\Models\BlogPost;
use App\Models\EmailTemplate;
use App\Models\HealthRecord;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ContentStatsWidget extends BaseWidget
{
    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        return [
            Stat::make('Blog Posts', BlogPost::count())
                ->description(BlogPost::where('status', 'published')->count().' published')
                ->descriptionIcon('heroicon-m-pencil-square')
                ->color('primary'),

            Stat::make('Email Templates', EmailTemplate::count())
                ->description(EmailTemplate::where('is_active', true)->count().' active')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('success'),

            Stat::make('Health Entries', HealthRecord::count())
                ->description('Last '.(HealthRecord::max('recorded_date') ? now()->diffInDays(HealthRecord::max('recorded_date')).' days tracked' : 'entry needed'))
                ->descriptionIcon('heroicon-m-heart')
                ->color('warning'),
        ];
    }
}
