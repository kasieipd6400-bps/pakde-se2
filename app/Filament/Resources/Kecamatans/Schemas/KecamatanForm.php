<?php

namespace App\Filament\Resources\Kecamatans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KecamatanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kabupaten_id'),
                TextInput::make('idkec')
                    ->required(),
                TextInput::make('nmkec')
                    ->required(),
            ]);
    }
}
