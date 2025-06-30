<?php

namespace Branzia\Admin\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BasePage;

class Login extends BasePage
{
    public function mount(): void
    {
        parent::mount();

        $this->form->fill([
            'email' => 'admin@branzia.co.in',
            'password' => '123456',
            'remember' => true,
        ]);
    }
}