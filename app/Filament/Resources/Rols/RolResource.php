<?php

namespace App\Filament\Resources\Rols;

use App\Filament\Resources\Rols\Pages\CreateRol;
use App\Filament\Resources\Rols\Pages\EditRol;
use App\Filament\Resources\Rols\Pages\ListRols;
use App\Filament\Resources\Rols\Schemas\RolForm;
use App\Filament\Resources\Rols\Tables\RolsTable;
use App\Models\Rol;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RolResource extends Resource
{
    protected static ?string $model = Rol::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Rol';

    public static function form(Schema $schema): Schema
    {
        return RolForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RolsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRols::route('/'),
            'create' => CreateRol::route('/create'),
            'edit' => EditRol::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Rol';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Roles';
    }
}
