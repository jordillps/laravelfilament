<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ChangePassword extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    // protected static string|null $navigationIcon = 'heroicon-o-key';
    protected string $view = 'filament.pages.change-password';
    protected static ?string $title = 'Cambiar contraseña';
    protected static ?string $navigationLabel = 'Cambiar contraseña';
    protected static ?int $navigationSort = 1001;

    public $password;
    public $password_confirmation;

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('password')
                ->label('Nueva contraseña')
                ->password()
                ->revealable()
                ->required()
                ->minLength(8)
                ->same('password_confirmation'),
            Forms\Components\TextInput::make('password_confirmation')
                ->label('Confirmar nueva contraseña')
                ->password()
                ->revealable()
                ->required(),
        ];
    }

    public function submit()
    {
        $user = Auth::user();
        $user->password = Hash::make($this->password);
        $user->save();
        $this->form->fill(['password' => '', 'password_confirmation' => '']);
        Notification::make()
            ->title('Contraseña actualizada correctamente')
            ->success()
            ->send();
    }

    public static function messages(): array
    {
        return [
            'password.required' => 'La nueva contraseña es obligatoria.',
            'password.min' => 'La nueva contraseña debe tener al menos :min caracteres.',
            'password.same' => 'La nueva contraseña y la confirmación deben coincidir.',
            'password_confirmation.required' => 'La confirmación de la nueva contraseña es obligatoria.',
        ];
    }
}
