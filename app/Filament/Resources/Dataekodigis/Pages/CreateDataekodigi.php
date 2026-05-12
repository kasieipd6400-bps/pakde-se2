<?php

namespace App\Filament\Resources\Dataekodigis\Pages;

use App\Filament\Resources\Dataekodigis\DataekodigiResource;
use App\Models\Dataekodigi;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class CreateDataekodigi extends CreateRecord
{
    protected static string $resource = DataekodigiResource::class;

    protected static bool $canCreateAnother =false;
    //This is importan function for repeater use in DataEkodigiResource
    protected function handleRecordCreation(array $data): Dataekodigi
    {
            $usahas = $data['usahas'] ?? [];

            unset($data['usahas']);

            $firstRecord = null;

             if (empty($usahas)) {
                    throw ValidationException::withMessages([
                        'usahas' => 'Minimal harus ada 1 data usaha.',
                    ]);
            }

            foreach ($usahas as $usaha) {
                $record = Dataekodigi::create([
                    ...$data,
                    ...$usaha,
                ]);

                $firstRecord ??= $record;
            }

            return $firstRecord;
    }

    protected function mutateFormDataBeforeCreate(array $data): array
        {
            $token = $data['captcha'] ?? null;

            if (blank($token)) {
                Notification::make()
                    ->title('Captcha wajib diisi.')
                    ->danger()
                    ->send();

                $this->halt();
            }

            $response = Http::asForm()->post(
                'https://challenges.cloudflare.com/turnstile/v0/siteverify',
                [
                    'secret' => config('services.turnstile.secret_key'),
                    'response' => $token,
                    'remoteip' => request()->ip(),
                ]
            )->json();

            if (!($response['success'] ?? false)) {
                Notification::make()
                    ->title('Captcha tidak valid.')
                    ->body('Silakan refresh captcha lalu coba lagi.')
                    ->danger()
                    ->send();

                $this->halt();
            }

            unset($data['captcha']);

            return $data;
        }

    /*
    //Captcha Cloud-flare Turnstile v1
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        
        $token = request('cf-turnstile-response');

        if (!$token) {
            throw ValidationException::withMessages([
                'captcha' => 'Captcha wajib diisi.',
            ]);
        }

        $response = Http::asForm()->post(
            'https://challenges.cloudflare.com/turnstile/v0/siteverify',
            [
                'secret' => config('services.turnstile.secret_key'),
                'response' => $token,
                'remoteip' => request()->ip(),
            ]
        )->json();

        if (!($response['success'] ?? false)) {
            throw ValidationException::withMessages([
                'captcha' => 'Captcha tidak valid.',
            ]);
        }

        return $data;
        
    }
    */
}
