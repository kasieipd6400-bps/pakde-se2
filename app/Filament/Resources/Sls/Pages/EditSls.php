<?php

namespace App\Filament\Resources\Sls\Pages;

use App\Filament\Resources\Sls\SlsResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSls extends EditRecord
{
    protected static string $resource = SlsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
