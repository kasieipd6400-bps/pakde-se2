<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div
        wire:ignore
        x-data="{
            state: $wire.$entangle('{{ $getStatePath() }}'),

            init() {
                const render = () => {
                    turnstile.render(this.$refs.turnstile, {
                        sitekey: '{{ config('services.turnstile.site_key') }}',
                        callback: (token) => {
                            this.state = token
                        },
                        'expired-callback': () => {
                            this.state = null
                        },
                        'error-callback': () => {
                            this.state = null
                        },
                    })
                }

                if (window.turnstile) {
                    render()
                } else {
                    window.addEventListener('turnstile-loaded', render, { once: true })
                }
            },
        }"
    >
        <div x-ref="turnstile"></div>
    </div>

    @once
        <script
            src="https://challenges.cloudflare.com/turnstile/v0/api.js?render=explicit"
            async
            defer
            onload="window.dispatchEvent(new Event('turnstile-loaded'))"
        ></script>
    @endonce
</x-dynamic-component>
