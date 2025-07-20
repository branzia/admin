<?php 


namespace Branzia\Admin\Filament\Settings;
use Branzia\Settings\Contracts\FormSchema;

use Filament\Forms\Components\TextInput;
class Admin extends FormSchema 
{
    public static string $tab = 'Admin';
    public static string $group = 'General';
    public static int $sort = 1;

    public static function baseSchema(): array
    {
        return [
            TextInput::make('admin.name')->label('Admin'),
            TextInput::make('admin.billing.name')->label('Admin Builling Name'),
        ];

    }
    
}