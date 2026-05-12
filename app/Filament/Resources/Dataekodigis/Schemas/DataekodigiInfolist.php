<?php

namespace App\Filament\Resources\Dataekodigis\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class DataekodigiInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('sls_id')
                    ->placeholder('-'),
                TextEntry::make('namapemilik')
                    ->label('Nama Pemilik'),
                TextEntry::make('kategori_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('namausaha')
                    ->label('Nama Usaha'),
                TextEntry::make('keteranganekodigi'),
                TextEntry::make('alamatusaha'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
