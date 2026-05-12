<?php

namespace App\Filament\Resources\Dataekodigis\Pages;

use App\Filament\Resources\Dataekodigis\DataekodigiResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditDataekodigi extends EditRecord
{
    protected static string $resource = DataekodigiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
