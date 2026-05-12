<?php

namespace App\Filament\Resources\Kategoris\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KategoriForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nmkategorikodigi')
                    ->required(),
                Textarea::make('contoh')
                    ->required(),
                Textarea::make('deskripsikategori')
                    ->required(),
            ]);
    }
}
