<?php

namespace App\Filament\Resources\Dataekodigis\Schemas;

use App\Forms\Components\Turnstile;
use App\Models\Desa;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Provinsi;
use App\Models\Sls;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class DataekodigiForm
{
    /*
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
                    //->dehydrated(false)
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
                    ->live()
                    ->dehydrated(false)
                    ->disabled(fn (Get $get) => blank($get('kabupaten_id')))
                    ->afterStateUpdated(function (Set $set) {
                         $set('desa_id', null);
                      }),
                Select::make('desa_id')
                    ->label('Desa')
                    ->options(fn (Get $get) => Desa::where('kecamatan_id', $get('kecamatan_id'))
                    ->pluck('nmdesa', 'id'))
                    ->searchable()
                    ->live()
                    ->dehydrated(false)
                    ->disabled(fn (Get $get) => blank($get('kecamatan_id')))
                    ->afterStateUpdated(function (Set $set) {
                         $set('sls_id', null);
                      }),
                Select::make('sls_id')
                    ->required()
                    ->label('ID SLS')
                    ->options(fn (Get $get) => Sls::where('desa_id', $get('desa_id'))
                    ->pluck('nmsls', 'id'))
                    ->searchable()
                    ->live()
                    ->required()
                    ->disabled(fn (Get $get) => blank($get('kecamatan_id'))),
                    //->afterStateUpdated(function (Set $set) {
                        // $set('id', null);
                     // }),
                TextInput::make('namapemilik')
                    ->required()
                    ->label('Nama Pemilik'),
                Textarea::make('alamatusaha')
                    ->label('Alamat Pemilik')
                    ->required(),
                TextInput::make('jmlusaha')
                    ->label('Jumlah Usaha')
                    ->required()
                    ->numeric()
                    ->integer()
                    ->minValue(1)
                    ->default(1)
                    ->maxValue(99)
                    ->live()
                    ->dehydrated(false)
                    ->afterStateUpdated(function (Set $set, $state) {
                        $jumlah = (int) ($state ?? 0);
                        $set('usahas', array_fill(0, $jumlah, [
                            'kategori_id' => null,
                            'namausaha' => null,
                            'keteranganekodigi' => null,
                            //'alamatusaha' => null,
                        ]));
                    }),
                Repeater::make('usahas')
                    ->label('Data Usaha')
                    ->schema([
                        Select::make('kategori_id')
                            ->label('Kategori')
                            ->relationship('kategori', 'nmkategorikodigi')
                            ->required(),
                        TextInput::make('namausaha')
                            ->label('Nama Usaha')
                            ->required(),
                        Textarea::make('keteranganekodigi')
                            ->label('Keterangan Usaha')
                            ->required(),
                    ])
                    ->columns(1)
                    ->defaultItems(1)
                    ->addable(false)
                    //->deletable()
                    ->deletable(false)
                    ->reorderable(false)
                    ->hidden(fn (Get $get) => blank($get('jmlusaha')) || (int) $get('jmlusaha') < 1),
                    Turnstile::make('captcha')
                        ->dehydrated()
                        ->columnSpanFull(),
            ]);
    }
    */
    
    // ✅ NEW static method — shared by both configure() and the Livewire public form
    public static function schema(): array
    {
        return [
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
                ->live()
                ->dehydrated(false)
                ->disabled(fn (Get $get) => blank($get('kabupaten_id')))
                ->afterStateUpdated(function (Set $set) {
                    $set('desa_id', null);
                }),

            Select::make('desa_id')
                ->label('Desa')
                ->options(fn (Get $get) => Desa::where('kecamatan_id', $get('kecamatan_id'))
                    ->pluck('nmdesa', 'id'))
                ->searchable()
                ->live()
                ->dehydrated(false)
                ->disabled(fn (Get $get) => blank($get('kecamatan_id')))
                ->afterStateUpdated(function (Set $set) {
                    $set('sls_id', null);
                }),

            Select::make('sls_id')
                ->required()
                ->label('ID SLS')
                ->options(fn (Get $get) => Sls::where('desa_id', $get('desa_id'))
                    ->pluck('nmsls', 'id'))
                ->searchable()
                ->live()
                ->disabled(fn (Get $get) => blank($get('kecamatan_id'))),

            TextInput::make('namapemilik')
                ->required()
                ->label('Nama Pemilik'),

            Textarea::make('alamatusaha')
                ->label('Alamat Usaha')
                ->required(),

            TextInput::make('jmlusaha')
                ->label('Jumlah Usaha')
                ->required()
                ->numeric()
                ->integer()
                ->minValue(1)
                ->default(1)
                ->maxValue(99)
                ->live()
                ->dehydrated(false)
                ->afterStateUpdated(function (Set $set, $state) {
                    $jumlah = (int) ($state ?? 0);
                    $set('usahas', array_fill(0, $jumlah, [
                        'kategori_id' => null,
                        'namausaha' => null,
                        'keteranganekodigi' => null,
                    ]));
                }),

            Repeater::make('usahas')
                ->label('Data Usaha')
                ->schema([
                    Select::make('kategori_id')
                        ->label('Kategori')
                        ->relationship('kategori', 'nmkategorikodigi')
                        ->required(),
                    TextInput::make('namausaha')
                        ->label('Nama Usaha')
                        ->required(),
                    Textarea::make('keteranganekodigi')
                        ->label('Keterangan Usaha')
                        ->required(),
                ])
                ->columns(1)
                ->defaultItems(1)
                ->addable(false)
                ->deletable(false)
                ->reorderable(false)
                ->hidden(fn (Get $get) => blank($get('jmlusaha')) || (int) $get('jmlusaha') < 1),

            Turnstile::make('captcha')
                ->dehydrated()
                ->columnSpanFull(),
        ];
    }

    // ✅ EXISTING method — body replaced to delegate to schema(), no duplication
    public static function configure(Schema $schema): Schema
    {
        return $schema->components(static::schema());
    }

    
}
