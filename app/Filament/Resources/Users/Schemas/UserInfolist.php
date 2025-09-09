<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Infolists\Components\ImageEntry;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('email')
                    ->label('Correo electrónico'),
                TextEntry::make('email_verified_at')
                    ->label('Verificado el')
                    ->dateTime(),
                TextEntry::make('role')
                    ->label('Rol'),
                IconEntry::make('active')
                    ->label('Activo')
                    ->boolean(),
                TextEntry::make('birthdate')
                    ->label('Fecha de nacimiento')
                    ->date(),
                ImageEntry::make('avatar')
                    ->disk('public')
                    ->square(),
                TextEntry::make('created_at')
                    ->label('Creado el')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->label('Actualizado el')
                    ->dateTime(),
            ]);
    }
}
