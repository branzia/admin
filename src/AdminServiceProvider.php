<?php
namespace Branzia\Admin;

use Filament\Facades\Filament;
use Branzia\Blueprint\BranziaServiceProvider;

class AdminServiceProvider extends BranziaServiceProvider
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
    }

    public function register(): void
    {
        parent::register();
        $this->app->register(AdminPanelProvider::class);
    }
}
