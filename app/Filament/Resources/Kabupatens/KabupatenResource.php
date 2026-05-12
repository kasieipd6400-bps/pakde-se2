<?php

namespace App\Filament\Resources\Kabupatens;

use App\Filament\Resources\Kabupatens\Pages\CreateKabupaten;
use App\Filament\Resources\Kabupatens\Pages\EditKabupaten;
use App\Filament\Resources\Kabupatens\Pages\ListKabupatens;
use App\Filament\Resources\Kabupatens\Pages\ViewKabupaten;
use App\Filament\Resources\Kabupatens\Schemas\KabupatenForm;
use App\Filament\Resources\Kabupatens\Schemas\KabupatenInfolist;
use App\Filament\Resources\Kabupatens\Tables\KabupatensTable;
use App\Models\Kabupaten;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KabupatenResource extends Resource
{
    protected static ?string $model = Kabupaten::class;
    //Give Label di Sidebar
    protected static ?string $navigationLabel = 'Master Kabupaten';
    protected static string | \UnitEnum | null $navigationGroup = 'Master Wilayah';

    protected static ?int $navigationSort = 2;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return KabupatenForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return KabupatenInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KabupatensTable::configure($table);
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
            'index' => ListKabupatens::route('/'),
            'create' => CreateKabupaten::route('/create'),
            'view' => ViewKabupaten::route('/{record}'),
            'edit' => EditKabupaten::route('/{record}/edit'),
        ];
    }
}
