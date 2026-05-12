<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kirim Berhasil</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @filamentStyles
    @livewireStyles
</head>
<body class="min-h-screen bg-gray-100">
    <main class="flex min-h-screen items-center justify-center px-4">
        <section class="w-full max-w-md rounded-2xl bg-white p-8 text-center shadow-sm ring-1 ring-gray-200">
            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-green-100">
                <svg class="h-9 w-9 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <h1 class="mt-6 text-2xl font-bold text-gray-900">
                Kirim Berhasil
            </h1>

            <p class="mt-3 text-sm leading-6 text-gray-600">
                Terima kasih. Data Anda sudah berhasil dikirim.
            </p>

            <a
                href="{{ url('/usaha-digital') }}"
                class="mt-6 inline-flex items-center justify-center rounded-lg bg-green-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-700"
            >
                Kirim Data Lagi
            </a>
        </section>
    </main>
</body>
</html>