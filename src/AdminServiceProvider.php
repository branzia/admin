<?php
namespace Branzia\Admin;

use Filament\Facades\Filament;
use Branzia\Blueprint\BranziaServiceProvider;
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
        
    }

    public function register(): void
    {
        parent::register();
    }

    public static function filamentDiscoveryPaths(): array
    {
        return [
            'resources' => [
                ['path' => __DIR__.'/Filament/Resources', 'namespace' => 'Branzia\\Admin\\Filament\\Resources'],
            ],
            'pages' => [
                ['path' => __DIR__.'/Filament/Pages', 'namespace' => 'Branzia\\Admin\\Filament\\Pages'],
            ],
            'clusters' => [
                ['path' => __DIR__.'/Filament/Clusters', 'namespace' => 'Branzia\\Admin\\Filament\\Clusters'],
            ],
            'widgets' => [
                ['path' => __DIR__.'/Filament/Widgets', 'namespace' => 'Branzia\\Admin\\Filament\\Widgets'],
            ],
        ];
    }
}
