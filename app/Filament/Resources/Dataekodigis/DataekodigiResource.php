<?php

namespace App\Filament\Resources\Dataekodigis;

use App\Filament\Resources\Dataekodigis\Pages\CreateDataekodigi;
use App\Filament\Resources\Dataekodigis\Pages\EditDataekodigi;
use App\Filament\Resources\Dataekodigis\Pages\ListDataekodigis;
use App\Filament\Resources\Dataekodigis\Pages\ViewDataekodigi;
use App\Filament\Resources\Dataekodigis\Schemas\DataekodigiForm;
use App\Filament\Resources\Dataekodigis\Schemas\DataekodigiInfolist;
use App\Filament\Resources\Dataekodigis\Tables\DataekodigisTable;
use App\Models\Dataekodigi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DataekodigiResource extends Resource
{
    protected static ?string $model = Dataekodigi::class;
    protected static ?string $navigationLabel = 'Master Data Ekonomi Digital';
    protected static string | \UnitEnum | null $navigationGroup = 'Master Data';

    protected static ?int $navigationSort = 2;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return DataekodigiForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DataekodigiInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataekodigisTable::configure($table);
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
            'index' => ListDataekodigis::route('/'),
            'create' => CreateDataekodigi::route('/create'),
            'view' => ViewDataekodigi::route('/{record}'),
            'edit' => EditDataekodigi::route('/{record}/edit'),
        ];
    }
}
