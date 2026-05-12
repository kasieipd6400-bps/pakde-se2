<?php

namespace App\Filament\Resources\Sls\Schemas;

use App\Models\Desa;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Provinsi;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class SlsForm
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
                        $set('desa_id', null);
                      }),

                Select::make('kabupaten_id')
                    ->label('Kabupaten')
                    ->options(fn (Get $get) => Kabupaten::where('provinsi_id', $get('provinsi_id'))
                    ->pluck('nmkab', 'id'))
                    ->searchable()
                    ->live()
                    ->dehydrated(false)
                    ->disabled(fn (Get $get) => blank($get('provinsi_id')))
                    ->afterStateUpdated(function (Set $set) {
                        $set('kecamatan_id', null);
                        $set('desa_id', null);
                      }),

                Select::make('kecamatan_id')
                    ->label('Kecamatan')
                    ->options(fn (Get $get) => Kecamatan::where('kabupaten_id', $get('kabupaten_id'))
                    ->pluck('nmkec', 'id'))
                    ->searchable()
                    ->required()
                    ->disabled(fn (Get $get) => blank($get('kabupaten_id')))
                    ->afterStateUpdated(function (Set $set) {
                         $set('desa_id', null);
                      }),
                Select::make('desa_id')
                    ->label('Desa')
                    ->options(fn (Get $get) => Desa::where('kecamatan_id', $get('kecamatan_id'))
                    ->pluck('nmdesa', 'id'))
                    ->searchable()
                    ->required()
                    ->disabled(fn (Get $get) => blank($get('kecamatan_id')))
                    ->afterStateUpdated(function (Set $set) {
                         $set('id', null);
                      }),
                TextInput::make('idsls')
                    ->label('ID-SLS')
                    ->required(),
                TextInput::make('nmsls')
                    ->label('Nama SLS')
                    ->required(),
            ]);
    }
}
