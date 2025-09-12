<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\UserResource;
use Illuminate\Support\Facades\Hash;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (!empty($data['new_password'])) {
            $data['password'] = Hash::make($data['new_password']);
        }
        unset($data['new_password'], $data['new_password_confirmation']);
        return $data;
    }
}