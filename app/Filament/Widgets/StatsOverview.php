<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Noticias Cadastradas', '192.1k'),
            Stat::make('Eventos Cadastrados', '21%'),
            Stat::make('Links', '3:12'),
        ];
    }
}
