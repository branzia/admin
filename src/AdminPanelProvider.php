<?php

namespace Branzia\Admin;

use Branzia\Blueprint\BranziaPanelProvider;
use Filament\Panel;
use Filament\Pages;
use Filament\Widgets;
class AdminPanelProvider extends BranziaPanelProvider
{
    public function panel(Panel $panel): Panel
    {  
        return $this->basePanel($panel)
            ->id('admin')
            ->path('admin')
            ->discoverResources(in: __DIR__.'/Filament/Resources', for: 'Branzia\\Admin\\Filament\\Resources')
            ->discoverPages(in: __DIR__.'/Filament/Pages', for: 'Branzia\\Admin\\Filament\\Pages')
            ->discoverClusters(in: __DIR__.'/Filament/Clusters', for: 'Branzia\\Admin\\Filament\\Clusters')
            ->discoverWidgets(in: __DIR__.'/Filament/Widgets', for: 'Branzia\\Admin\\Filament\\Widgets')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ]);
    }
}