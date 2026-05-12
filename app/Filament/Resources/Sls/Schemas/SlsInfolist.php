<?php

namespace App\Filament\Resources\Sls\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SlsInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id')
                    ->label('ID'),
                TextEntry::make('desa.id')
                    ->label('Desa')
                    ->placeholder('-'),
                TextEntry::make('idsls'),
                TextEntry::make('nmsls'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
