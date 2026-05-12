<?php

namespace App\Filament\Resources\Sls\Pages;

use App\Filament\Resources\Sls\SlsResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSls extends ViewRecord
{
    protected static string $resource = SlsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
