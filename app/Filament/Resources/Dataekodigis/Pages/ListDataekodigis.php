<?php

namespace App\Filament\Resources\Dataekodigis\Pages;

use App\Filament\Resources\Dataekodigis\DataekodigiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDataekodigis extends ListRecords
{
    protected static string $resource = DataekodigiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
