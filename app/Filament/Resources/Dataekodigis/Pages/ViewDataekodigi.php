<?php

namespace App\Filament\Resources\Dataekodigis\Pages;

use App\Filament\Resources\Dataekodigis\DataekodigiResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDataekodigi extends ViewRecord
{
    protected static string $resource = DataekodigiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
