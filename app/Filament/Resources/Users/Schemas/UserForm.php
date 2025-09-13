<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required(),
                TextInput::make('email')
                    ->label('Correo electrónico')
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at')
                    ->label('Correo verificado el'),
                Select::make('role')
                    ->label('Rol')
                    ->required()
                    ->options(
                        User::query()
                            ->distinct()
                            ->pluck('role', 'role')
                            ->toArray()
                    )
                    ->disabled(fn () => Auth::user()?->role !== 'admin'),
                Toggle::make('active')
                    ->label('Activo')
                    ->required(),
                DatePicker::make('birthdate')
                    ->label('Fecha de nacimiento'),
                FileUpload::make('avatar')
                    ->label('Avatar')
                    ->avatar()
                    ->disk('public')
                    ->image()
                    ->visibility('public'),
        ]);
    }

    public static function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico no es válido.',
            'role.required' => 'El rol es obligatorio.',
            'active.required' => 'El estado activo es obligatorio.',
            'birthdate.date' => 'La fecha de nacimiento no es válida.',
            'avatar.image' => 'El avatar debe ser una imagen.',
        ];
    }

    public static function validationAttributes(): array
    {
        return [
            'name' => 'nombre',
            'email' => 'correo electrónico',
            'password' => 'contraseña',
            'password_confirmation' => 'confirmación de contraseña',
            'role' => 'rol',
            'active' => 'activo',
            'birthdate' => 'fecha de nacimiento',
            'avatar' => 'avatar',
        ];
    }
}
