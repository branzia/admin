<?php
namespace Branzia\Admin;

use Filament\Facades\Filament;
use Branzia\Blueprint\BranziaServiceProvider;
use Branzia\Settings\Services\SettingsRegistry;
use Branzia\Blueprint\Contracts\ProvidesFilamentDiscovery;

class AdminServiceProvider extends BranziaServiceProvider implements ProvidesFilamentDiscovery
{
    public function moduleName(): string
    {
        return 'Admin';
    }
    public function moduleRootPath():string{
        return dirname(__DIR__);
    }
    
    public function boot():void
    {
        
        parent::boot();
        SettingsRegistry::push(\Branzia\Admin\Filament\Settings\Admin::class);
    }

    public function register(): void
    {
        parent::register();
    }

    
}
