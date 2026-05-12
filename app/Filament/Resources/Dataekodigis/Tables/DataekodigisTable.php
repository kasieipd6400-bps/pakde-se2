<?php

namespace App\Filament\Resources\Dataekodigis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DataekodigisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sls_id')
                    ->searchable(),
                TextColumn::make('namapemilik')
                    ->searchable(),
                //TextColumn::make('jmlusaha')
                    //->numeric()
                    //->sortable(),
                TextColumn::make('kategori_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('namausaha')
                    ->searchable(),
                TextColumn::make('keteranganekodigi')
                    ->searchable(),
                TextColumn::make('alamatusaha')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
