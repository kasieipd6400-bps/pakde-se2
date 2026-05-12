<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

<div class="mt-6" wire:ignore>
    <div 
        id="turnstile-container"
        class="cf-turnstile"
        data-sitekey="{{ config('services.turnstile.site_key') }}">
    </div>

    @error('captcha')
        <div class="text-danger-600 text-sm mt-2">
            {{ $message }}
        </div>
    @enderror
</div>