<?php

namespace App\Filament\Resources\Kabupatens\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KabupatenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('id')
                    ->required(),
                Select::make('provinsi_id')
                    ->relationship('provinsi', 'id'),
                TextInput::make('idkab')
                    ->required(),
                TextInput::make('nmkab')
                    ->required(),
            ]);
    }
}
