<?php

namespace App\Filament\Resources\Desas\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class DesaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID'),
                TextEntry::make('kecamatan_id')
                    ->placeholder('-'),
                TextEntry::make('iddesa'),
                TextEntry::make('nmdesa'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
