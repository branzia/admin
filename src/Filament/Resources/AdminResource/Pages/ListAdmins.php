<?php

namespace Branzia\Admin\Filament\Resources\AdminResource\Pages;

use Branzia\Admin\Filament\Resources\AdminResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdmins extends ListRecords
{
    protected static string $resource = AdminResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
