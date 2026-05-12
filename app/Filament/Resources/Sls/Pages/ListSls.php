<?php

namespace App\Filament\Resources\Sls\Pages;

use App\Filament\Resources\Sls\SlsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSls extends ListRecords
{
    protected static string $resource = SlsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
