<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;
use Override;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    //Disable "Create Another" Button
    protected static bool $canCreateAnother =false;
    
    //Redirect to resource index after form action
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function afterCreate():void
    {
        $this->record->email_verified_at=now();
        $this->record->save();
    }
}
