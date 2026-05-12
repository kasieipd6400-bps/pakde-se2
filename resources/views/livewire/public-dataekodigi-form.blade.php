<div>
    @if($submitted)
        <div class="p-4 bg-green-100 text-green-800 rounded-lg text-center">
            ✅ Data berhasil dikirim! Terima kasih.
        </div>
    @else
        <form wire:submit="submit">
            {{ $this->form }}

            <div class="mt-6">
                <button type="submit"
                    class="w-full px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                    Kirim Data
                </button>
            </div>
        </form>

        <x-filament-actions::modals />
    @endif
</div>