<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Solo mostrar el botón si el usuario puede crear
            ...(static::canCreate() ? [CreateAction::make()] : []),
        ];
    }

    public static function canCreate(): bool
    {
        return Auth::user()?->role === 'admin';
    }
}
