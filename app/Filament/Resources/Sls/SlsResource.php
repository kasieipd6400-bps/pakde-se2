<?php

namespace App\Filament\Resources\Sls;

use App\Filament\Resources\Sls\Pages\CreateSls;
use App\Filament\Resources\Sls\Pages\EditSls;
use App\Filament\Resources\Sls\Pages\ListSls;
use App\Filament\Resources\Sls\Pages\ViewSls;
use App\Filament\Resources\Sls\Schemas\SlsForm;
use App\Filament\Resources\Sls\Schemas\SlsInfolist;
use App\Filament\Resources\Sls\Tables\SlsTable;
use App\Models\Sls;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SlsResource extends Resource
{
    protected static ?string $model = Sls::class;
    protected static ?string $navigationLabel = 'Master SLS/NonSLS';
    protected static string | \UnitEnum | null $navigationGroup = 'Master Wilayah';

    protected static ?int $navigationSort = 5;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SlsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SlsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SlsTable::configure($table);
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
            'index' => ListSls::route('/'),
            'create' => CreateSls::route('/create'),
            'view' => ViewSls::route('/{record}'),
            'edit' => EditSls::route('/{record}/edit'),
        ];
    }
}
