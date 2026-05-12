<?php

namespace App\Filament\Resources\Desas\Schemas;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Provinsi;
//use App\Filament\Resources\Desas\Schemas\Provinsi;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class DesaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('provinsi_id')
                    ->label('Provinsi')
                    ->options(Provinsi::pluck('nmprov', 'id'))
                    ->searchable()
                    ->live()
                    ->dehydrated(false)
                    ->afterStateUpdated(function (Set $set) {
                        $set('kabupaten_id', null);
                        $set('kecamatan_id', null);
                      }),

                Select::make('kabupaten_id')
                    ->label('Kabupaten')
                    ->options(fn (Get $get) => Kabupaten::where('provinsi_id', $get('provinsi_id'))
                    ->pluck('nmkab', 'id'))
                    ->searchable()
                    ->live()
                    ->dehydrated(false)
                    ->disabled(fn (Get $get) => blank($get('provinsi_id')))
                    ->afterStateUpdated(fn (Set $set) => $set('kecamatan_id', null)),

                Select::make('kecamatan_id')
                    ->label('Kecamatan')
                    ->options(fn (Get $get) => Kecamatan::where('kabupaten_id', $get('kabupaten_id'))
                    ->pluck('nmkec', 'id'))
                    ->searchable()
                    ->required()
                    ->disabled(fn (Get $get) => blank($get('kabupaten_id'))),
                TextInput::make('id')
                    ->required(), 
                TextInput::make('iddesa')
                    ->required(),
                TextInput::make('nmdesa')
                    ->required(),
            ]);
    }
}
