<div x-data="{
    theme: localStorage.getItem('ek-theme') || 'dark',
    setTheme(t) {
        this.theme = t;
        localStorage.setItem('ek-theme', t);
    },
    showDefinisiModal: false
}" x-bind:data-theme="theme" class="ekodigi-wrap">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        /* ── THEME VARIABLES ── */
        [data-theme="dark"] {
            --bg:           #0a0a0a;
            --bg-grad:      radial-gradient(ellipse 80% 50% at 50% -20%, rgba(255,255,255,0.04) 0%, transparent 60%);
            --card-bg:      #111111;
            --card-border:  #1f1f1f;
            --card-divider: #1a1a1a;
            --step-bg:      #1a1a1a;
            --step-border:  #2a2a2a;
            --step-color:   #71717a;
            --card-title:   #d4d4d8;
            --field-bg:     #0d0d0d;
            --field-border: #272727;
            --field-focus:  #3f3f46;
            --field-color:  #f4f4f5;
            --placeholder:  #3f3f46;
            --label-color:  #a1a1aa;
            --arrow-color:  #52525b;
            --usaha-bg:     #0d0d0d;
            --usaha-border: #1f1f1f;
            --usaha-label:  #52525b;
            --num-bg:       #0d0d0d;
            --num-border:   #272727;
            --num-divider:  #1f1f1f;
            --num-color:    #f4f4f5;
            --num-hover:    #1a1a1a;
            --btn-color:    #71717a;
            --btn-hover-bg: #1a1a1a;
            --btn-hover-c:  #e4e4e7;
            --submit-bg:    #fafafa;
            --submit-color: #09090b;
            --submit-hover: #e4e4e7;
            --badge-bg:     rgba(255,255,255,0.06);
            --badge-border: rgba(255,255,255,0.1);
            --badge-color:  #a1a1aa;
            --title-color:  #fafafa;
            --error-color:  #f87171;
            --divider-bg:   #1a1a1a;
            --footer-color: #3f3f46;
            --footer-border:#1f1f1f;
            --footer-heart: #f87171;
        }

        [data-theme="light"] {
            --bg:           #fdf6ee;
            --bg-grad:      none;
            --card-bg:      #fffaf4;
            --card-border:  #e8d5b7;
            
            /*
            --bg:           #f4f4f5;
            --bg-grad:      none;
            --card-bg:      #ffffff;
            --card-border:  #e4e4e7;
            */
            --card-divider: #e4e4e7;
            --step-bg:      #f4f4f5;
            --step-border:  #d4d4d8;
            --step-color:   #71717a;
            --card-title:   #18181b;
            --field-bg:     #fafafa;
            --field-border: #d4d4d8;
            --field-focus:  #a1a1aa;
            --field-color:  #18181b;
            --placeholder:  #a1a1aa;
            --label-color:  #52525b;
            --arrow-color:  #a1a1aa;
            --usaha-bg:     #f4f4f5;
            --usaha-border: #e4e4e7;
            --usaha-label:  #a1a1aa;
            --num-bg:       #ffffff;
            --num-border:   #d4d4d8;
            --num-divider:  #e4e4e7;
            --num-color:    #18181b;
            --num-hover:    #f4f4f5;
            --btn-color:    #71717a;
            --btn-hover-bg: #f4f4f5;
            --btn-hover-c:  #18181b;
            --submit-bg:    #18181b;
            --submit-color: #ffffff;
            --submit-hover: #27272a;
            --badge-bg:     rgba(0,0,0,0.04);
            --badge-border: rgba(0,0,0,0.08);
            --badge-color:  #52525b;
            --title-color:  #09090b;
            --error-color:  #ef4444;
            --divider-bg:   #e4e4e7;
            --footer-color: #a1a1aa;
            --footer-border:#e4e4e7;
            --footer-heart: #ef4444;
        }
        [data-theme="light"] .ek-definisi-btn {
            color: #0c0c0c;
            border-color: #ea580c;
        }
        [data-theme="light"] .ek-definisi-btn:hover {
            background: #ea580c;
            color: #fff;
        }

        body {
            background: var(--bg);
            font-family: 'DM Sans', sans-serif;
            color: var(--field-color);
            min-height: 100vh;
        }

        .ekodigi-wrap {
            min-height: 100vh;
            background: var(--bg-grad), var(--bg);
            padding: 48px 16px 0;
            transition: background 0.3s;
            display: flex;
            flex-direction: column;
        }

        .ek-container {
            max-width: 680px;
            margin: 0 auto;
            width: 100%;
            flex: 1;
            padding-bottom: 48px;
        }

        /* Header */
        .ek-header {
            margin-bottom: 24px;
            animation: fadeUp 0.5s ease both;
        }
        .ek-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--badge-bg);
            border: 1px solid var(--badge-border);
            border-radius: 100px;
            padding: 4px 12px;
            font-size: 11px;
            font-family: 'DM Mono', monospace;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--badge-color);
            margin-bottom: 16px;
        }
        .ek-badge-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: #22c55e;
            box-shadow: 0 0 6px #22c55e;
            animation: pulse 2s ease infinite;
        }

        /* Logo row */
        .ek-logos {
            display: inline-flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
            background: #ffffff;
            border-radius: 12px;
            padding: 10px 16px;
        }
        .ek-logos img {
            height: 48px;
            width: auto;
            object-fit: contain;
        }
        .ek-logos-divider {
            width: 1px;
            height: 32px;
            background: #d4d4d8;
            flex-shrink: 0;
        }

        .ek-title {
            font-size: clamp(24px, 5vw, 36px);
            font-weight: 600;
            color: var(--title-color);
            line-height: 1.2;
            letter-spacing: -0.02em;
        }

        /* Theme toggle buttons */
        .ek-theme-toggle {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 16px;
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 100px;
            padding: 4px;
        }
        .ek-theme-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 100px;
            border: none;
            font-family: 'DM Sans', sans-serif;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
            background: transparent;
            color: var(--label-color);
        }
        .ek-theme-btn svg {
            width: 13px; height: 13px;
            flex-shrink: 0;
        }
        .ek-theme-btn.active-light {
            background: #ffffff;
            color: #09090b;
            box-shadow: 0 1px 4px rgba(0,0,0,0.1);
        }
        .ek-theme-btn.active-dark {
            background: #18181b;
            color: #fafafa;
            box-shadow: 0 1px 4px rgba(0,0,0,0.4);
        }

        /* Card */
        .ek-card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 16px;
            overflow: hidden;
            animation: fadeUp 0.5s ease both;
            transition: background 0.3s, border-color 0.3s;
        }
        .ek-card + .ek-card { margin-top: 12px; }

        .ek-card-header {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 20px 24px;
            border-bottom: 1px solid var(--card-divider);
        }
        .ek-step {
            width: 28px; height: 28px;
            border-radius: 8px;
            background: var(--step-bg);
            border: 1px solid var(--step-border);
            display: flex; align-items: center; justify-content: center;
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            color: var(--step-color);
            flex-shrink: 0;
        }
        
        .ek-card-title {
                font-size: 13px;
                font-weight: 600;
                color: #fb923c;
                letter-spacing: 0.01em;
        }
        /*
        .ek-card-title {
            font-size: 13px;
            font-weight: 600;
            color: var(--card-title);
            letter-spacing: 0.01em;
        }
        */
        .ek-card-body { padding: 24px; }

        /* Definisi button */
        .ek-definisi-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 0 18px;
            height: 44px;
            background: transparent;
            border: 1px solid #fb923c;
            border-radius: 10px;
            color: #fb923c;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.15s, color 0.15s;
            white-space: normal;        
            word-break: break-word;
            width: 100%;                
            justify-content: center;   
        }
        .ek-definisi-btn:hover { background: #fb923c; color: #fff; }
        .ek-definisi-btn:hover span { box-shadow: 0 0 5px #fff; }
        .ek-definisi-btn svg { width: 15px; height: 15px; flex-shrink: 0; }

        /* Grid */
        .ek-grid { display: grid; gap: 16px; }
        .ek-grid-2 { grid-template-columns: 1fr 1fr; }
        @media (max-width: 560px) { .ek-grid-2 { grid-template-columns: 1fr; } }

        /* Field */
        .ek-field { display: flex; flex-direction: column; gap: 6px; }
        .ek-label {
            font-size: 12px;
            font-weight: 500;
            color: var(--field-color);
            letter-spacing: 0.03em;
         }
        .ek-required { color: #ef4444; margin-left: 2px; }

        .ek-input, .ek-select, .ek-textarea {
            width: 100%;
            background: var(--field-bg);
            border: 1px solid var(--field-border);
            border-radius: 10px;
            color: var(--field-color);
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            transition: border-color 0.15s, box-shadow 0.15s, background 0.3s;
            outline: none;
        }
        .ek-input, .ek-select { padding: 10px 14px; height: 42px; }
        .ek-textarea { padding: 10px 14px; min-height: 90px; resize: vertical; }

        .ek-input:focus, .ek-select:focus, .ek-textarea:focus {
            border-color: var(--field-focus);
            box-shadow: 0 0 0 3px rgba(128,128,128,0.08);
        }
        .ek-input::placeholder, .ek-textarea::placeholder { color: var(--placeholder); }
        .ek-select { appearance: none; cursor: pointer; }
        .ek-select-wrap { position: relative; }
        .ek-select-wrap::after {
            content: '';
            position: absolute;
            right: 14px; top: 50%;
            transform: translateY(-50%);
            width: 0; height: 0;
            border-left: 4px solid transparent;
            border-right: 4px solid transparent;
            border-top: 5px solid var(--arrow-color);
            pointer-events: none;
        }
        .ek-select:disabled { opacity: 0.35; cursor: not-allowed; }

        /* Hide spinners on all number inputs */
        .ek-input[type=number]   { -moz-appearance: textfield; }
        .ek-input[type=number]::-webkit-inner-spin-button,
        .ek-input[type=number]::-webkit-outer-spin-button { -webkit-appearance: none; }

        /* Error */
        .ek-error {
            font-size: 11.5px;
            color: var(--error-color);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Usaha repeater */
        .ek-usaha-item {
            background: var(--usaha-bg);
            border: 1px solid var(--usaha-border);
            border-radius: 12px;
            padding: 20px;
            position: relative;
            transition: background 0.3s, border-color 0.3s;
        }
        .ek-usaha-item + .ek-usaha-item { margin-top: 10px; }
        .ek-usaha-label {
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            color: var(--usaha-label);
            letter-spacing: 0.06em;
            text-transform: uppercase;
            margin-bottom: 16px;
        }

        /* Number control */
        .ek-number-control {
            display: flex;
            align-items: center;
            background: var(--num-bg);
            border: 1px solid var(--num-border);
            border-radius: 10px;
            overflow: hidden;
            width: fit-content;
            transition: background 0.3s, border-color 0.3s;
        }
        .ek-number-btn {
            width: 40px; height: 42px;
            background: transparent;
            border: none;
            color: var(--btn-color);
            font-size: 18px;
            cursor: pointer;
            display: flex; align-items: center; justify-content: center;
            transition: background 0.1s, color 0.1s;
            flex-shrink: 0;
        }
        .ek-number-btn:hover { background: var(--btn-hover-bg); color: var(--btn-hover-c); }

        /* Number val — now an input */
        .ek-number-val {
            width: 48px;
            height: 42px;
            text-align: center;
            font-family: 'DM Mono', monospace;
            font-size: 15px;
            color: var(--num-color);
            background: transparent;
            border: none;
            border-left: 1px solid var(--num-divider);
            border-right: 1px solid var(--num-divider);
            padding: 0;
            line-height: 42px;
            outline: none;
            cursor: text;
            -moz-appearance: textfield;
        }
        .ek-number-val::-webkit-inner-spin-button,
        .ek-number-val::-webkit-outer-spin-button { -webkit-appearance: none; margin: 0; }

        /* Turnstile wrapper */
        .ek-turnstile-wrap {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        /* Submit button */
        .ek-submit-wrap { margin-top: 20px; animation: fadeUp 0.5s 0.3s ease both; }
        .ek-submit {
            width: 100%;
            height: 48px;
            background: var(--submit-bg);
            color: var(--submit-color);
            border: none;
            border-radius: 12px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            letter-spacing: 0.01em;
            transition: background 0.15s, transform 0.1s;
            display: flex; align-items: center; justify-content: center; gap: 8px;
        }
        .ek-submit:hover { background: var(--submit-hover); }
        .ek-submit:active { transform: scale(0.99); }
        .ek-submit:disabled { opacity: 0.5; cursor: not-allowed; transform: none; }

        /* Divider */
        .ek-divider {
            height: 1px;
            background: var(--divider-bg);
            margin: 20px 0;
        }

        /* Footer */
        .ek-footer {
            width: 100%;
            border-top: 1px solid var(--footer-border);
            padding: 20px 16px;
            text-align: center;
            transition: border-color 0.3s;
        }
        .ek-footer-text {
            font-size: 12px;
            color: var(--footer-color);
            font-family: 'DM Sans', sans-serif;
            line-height: 1.6;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 4px;
        }
        .ek-footer-heart {
            color: var(--footer-heart);
            font-size: 13px;
            line-height: 1;
        }
        .ek-footer-version {
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            color: var(--footer-color);
            opacity: 0.6;
        }

        [x-cloak] { display: none !important; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(14px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50%       { opacity: 0.4; }
        }
        @keyframes modalIn {
            from { opacity: 0; transform: scale(0.96) translateY(8px); }
            to   { opacity: 1; transform: scale(1) translateY(0); }
        }
    </style>

    <div class="ek-container">

        {{-- Header --}}
        <div class="ek-header">
            <div class="ek-badge">
                <span class="ek-badge-dot"></span>
                Pengisian Mandiri
            </div>
            <br>
            {{-- Logos with white background --}}
            <div class="ek-logos">
                <img src="{{ asset('images/logo-bps-kaltim.png') }}" alt="BPS Kalimantan Timur">
                <div class="ek-logos-divider"></div>
                <img src="{{ asset('images/Logo_Sensus_Ekonomi_2026.png') }}" alt="Sensus Ekonomi 2026">
            </div>

            <h1 class="ek-title">Pengisian Mandiri<br>Usaha Ekonomi Digital</h1>

            {{-- Theme toggle --}}
            <div class="ek-theme-toggle">
                <button
                    type="button"
                    class="ek-theme-btn"
                    :class="theme === 'light' ? 'active-light' : ''"
                    @click="setTheme('light')"
                >
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>
                    </svg>
                    Terang
                </button>
                <button
                    type="button"
                    class="ek-theme-btn"
                    :class="theme === 'dark' ? 'active-dark' : ''"
                    @click="setTheme('dark')"
                >
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>
                    </svg>
                    Gelap
                </button>
            </div>
        </div>{{-- end ek-header --}}
        
        <h1 class="ek-title" style="font-size: 20px; letter-spacing: 0.05em; font-weight: 1000;">RAHASIA</h1>
        
        {{-- Card 00: Keterangan Pengisian --}}
        <div class="ek-card" style="background: #ffedd5; border-color: #fed7aa; animation-delay: 0.02s; margin-bottom: 8px;">
            <div class="ek-card-header" style="border-bottom-color: #fed7aa;">
                <div class="ek-step" style="background: #ffedd5; border-color: #fed7aa; color: #ea580c;">00</div>
                <div class="ek-card-title" style="color: #9a3412;">Keterangan Pengisian</div>
                <span style="margin-left: auto; width: 8px; height: 8px; border-radius: 50%; background: #ef4444; box-shadow: 0 0 6px #ef4444; animation: pulse 1.5s ease infinite; flex-shrink: 0; display: inline-block;"></span>
            </div>
            <div class="ek-card-body" style="color: #9a3412; font-size: 13px; line-height: 1.7;">
                    <div style="display:flex; flex-direction:column; gap:14px;">

                        <div>
                            <div style="font-weight:700; margin-bottom:4px;">I. Tujuan</div>
                            <div>Pengisian Mandiri Usaha Ekonomi Digital bertujuan untuk menyediakan data dasar usaha digital yang akan digunakan pada saat kegiatan Pendataan Sensus Ekonomi 2026.</div>
                        </div>

                        <div>
                            <div style="font-weight:700; margin-bottom:6px;">II. Dasar Hukum</div>
                            <div style="display:flex; flex-direction:column; gap:4px;">
                                <div>a. Undang-Undang No. 16 Tahun 1997 tentang Statistik.</div>
                                <div>b. Peraturan Pemerintah RI No. 51 Tahun 1999 tentang Penyelenggaraan Statistik.</div>
                            </div>
                        </div>

                        <div>
                            <div style="font-weight:700; margin-bottom:4px;">III. Kerahasiaan</div>
                            <div>Kerahasiaan data yang diberikan dijamin oleh Undang-Undang No. 16 Tahun 1997 pasal 21.</div>
                        </div>

                        <div>
                            <div style="font-weight:700; margin-bottom:4px;">IV. Layanan Informasi</div>
                            <div>Untuk bantuan pengisian mandiri, dapat menghubungi Sekretariat Sensus Ekonomi Tahun 2026 - Badan Pusat Statistik Provinsi Kalimantan Timur. Email: <a href="mailto:bps6400@bps.go.id" style="color:#ea580c; text-decoration:underline;">bps6400@bps.go.id.</a></div>
                        </div>
                        <div>
                            <div style="font-weight:700; margin-bottom:4px;">V. Informasi Lanjutan</div>
                            <div>Setelah pengisian, Bapak/Ibu tetap akan dikunjungi oleh Petugas Lapangan Sensus Ekonomi 2026 yang akan dilaksanakan pada bulan Juni-Agustus 2026.</div>
                            <div>Mohon menerima kunjungan petugas kami dan memberikan data yang sebenar-benarnya.</div>
                        </div>

                    </div>
            </div>
        </div>

        {{-- Definisi Usaha Digital button below Card 00 --}}
        <button type="button" class="ek-definisi-btn" @click="showDefinisiModal = true" style="margin-bottom: 16px;">
                <span style="width:7px; height:7px; border-radius:50%; background:#ef4444; box-shadow:0 0 5px #ef4444; animation:pulse 1.5s ease infinite; flex-shrink:0; display:inline-block;"></span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/>
                </svg>
                    Klik di sini untuk definisi kategori usaha digital
        </button>

        <form wire:submit.prevent="submit">

            {{-- Card 01: Data Pemilik Usaha Digital --}}
            <div class="ek-card" style="animation-delay: 0.05s">
                <div class="ek-card-header">
                    <div class="ek-step">01</div>
                    <div class="ek-card-title">Data Pemilik Usaha Digital</div>
                </div>
                <div class="ek-card-body">
                    <div class="ek-grid">
                        <div class="ek-field">
                            <label class="ek-label">Nama Lengkap Pemilik Usaha Digital <span class="ek-required">*</span></label>
                            <input type="text" wire:model="namapemilik" class="ek-input" placeholder="Nama lengkap pemilik usaha">
                            @error('namapemilik') <span class="ek-error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card 02: Alamat Pemilik Usaha Digital --}}
            <div class="ek-card" style="animation-delay: 0.08s">
                <div class="ek-card-header">
                    <div class="ek-step">02</div>
                    <div class="ek-card-title">Alamat Pemilik Usaha Digital</div>
                </div>
                <div class="ek-card-body">
                    <div class="ek-grid ek-grid-2">

                        {{-- Provinsi --}}
                        <div class="ek-field">
                            <label class="ek-label">Provinsi <span class="ek-required">*</span></label>
                            <div class="ek-select-wrap">
                                <select wire:model.live="provinsi_id" class="ek-select">
                                    <option value="">Pilih Provinsi</option>
                                    @foreach($provinsiList as $id => $nama)
                                        <option value="{{ $id }}">{{ $nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('provinsi_id') <span class="ek-error">{{ $message }}</span> @enderror
                        </div>

                        {{-- Kabupaten --}}
                        <div class="ek-field">
                            <label class="ek-label">Kabupaten/Kota <span class="ek-required">*</span></label>
                            <div class="ek-select-wrap">
                                <select wire:model.live="kabupaten_id" class="ek-select" {{ blank($provinsi_id) ? 'disabled' : '' }}>
                                    <option value="">Pilih Kabupaten/Kota</option>
                                    @foreach($kabupatenList as $id => $nama)
                                        <option value="{{ $id }}">{{ $nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('kabupaten_id') <span class="ek-error">{{ $message }}</span> @enderror
                        </div>

                        {{-- Kecamatan --}}
                        <div class="ek-field">
                            <label class="ek-label">Kecamatan <span class="ek-required">*</span></label>
                            <div class="ek-select-wrap">
                                <select wire:model.live="kecamatan_id" class="ek-select" {{ blank($kabupaten_id) ? 'disabled' : '' }}>
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach($kecamatanList as $id => $nama)
                                        <option value="{{ $id }}">{{ $nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('kecamatan_id') <span class="ek-error">{{ $message }}</span> @enderror
                        </div>

                        {{-- Desa --}}
                        <div class="ek-field">
                            <label class="ek-label">Kelurahan/Desa <span class="ek-required">*</span></label>
                            <div class="ek-select-wrap">
                                <select wire:model.live="desa_id" class="ek-select" {{ blank($kecamatan_id) ? 'disabled' : '' }}>
                                    <option value="">Pilih Kelurahan/Desa</option>
                                    @foreach($desaList as $id => $nama)
                                        <option value="{{ $id }}">{{ $nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('desa_id') <span class="ek-error">{{ $message }}</span> @enderror
                        </div>

                        {{-- SLS --}}
                        <div class="ek-field" style="grid-column: 1 / -1">
                            <label class="ek-label">RT/RW <span class="ek-required">*</span></label>
                            <div class="ek-select-wrap">
                                <select wire:model.live="sls_id" class="ek-select" {{ blank($desa_id) ? 'disabled' : '' }}>
                                    <option value="">Pilih RT/RW</option>
                                    @foreach($slsList as $id => $nama)
                                        <option value="{{ $id }}">{{ $nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('sls_id') <span class="ek-error">{{ $message }}</span> @enderror
                        </div>

                        {{-- Alamat --}}
                        <div class="ek-field" style="grid-column: 1 / -1">
                            <label class="ek-label">Alamat Lengkap <span class="ek-required">*</span></label>
                            <textarea wire:model="alamatusaha" class="ek-textarea" placeholder="Alamat lengkap lokasi usaha digital"></textarea>
                            @error('alamatusaha') <span class="ek-error">{{ $message }}</span> @enderror
                        </div>

                    </div>
                </div>
            </div>

            {{-- Card 03: Data Usaha Digital --}}
            <div class="ek-card" style="animation-delay: 0.12s">
                <div class="ek-card-header">
                    <div class="ek-step">03</div>
                    <div class="ek-card-title">Data Usaha Digital</div>
                </div>
                <div class="ek-card-body">

                    {{-- Jumlah Usaha --}}
                    <div class="ek-field" style="margin-bottom: 24px">
                        <label class="ek-label">Jumlah Usaha <span class="ek-required">*</span></label>
                        <div style="display: flex; align-items: center; gap: 12px; flex-wrap: wrap;">
                            <div class="ek-number-control">
                                <button type="button" class="ek-number-btn"
                                    x-on:click="$wire.set('jmlusaha', Math.max(1, {{ $jmlusaha }} - 1))">−</button>
                                <input
                                    type="number"
                                    wire:model.live.debounce.500ms="jmlusaha"
                                    class="ek-number-val"
                                    min="1"
                                    max="99"
                                >
                                <button type="button" class="ek-number-btn"
                                    x-on:click="$wire.set('jmlusaha', Math.min(99, {{ $jmlusaha }} + 1))">+</button>
                            </div>
                            {{-- Definisi button beside stepper --}}
                            <button type="button" class="ek-definisi-btn" @click="showDefinisiModal = true" style="margin-bottom: 16px;">
                                    <span style="width:7px; height:7px; border-radius:50%; background:#ef4444; box-shadow:0 0 5px #ef4444; animation:pulse 1.5s ease infinite; flex-shrink:0; display:inline-block;"></span>
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/>
                                    </svg>
                                        Klik di sini untuk definisi kategori usaha digital
                            </button>
                        </div>
                        @error('jmlusaha') <span class="ek-error">{{ $message }}</span> @enderror
                    </div>

                    {{-- Repeater --}}
                    @foreach($usahas as $i => $usaha)
                        <div class="ek-usaha-item">
                            <div class="ek-usaha-label">Usaha {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</div>
                            <div class="ek-grid">

                                <div class="ek-field">
                                    <label class="ek-label">Kategori <span class="ek-required">*</span></label>
                                    <div class="ek-select-wrap">
                                        <select wire:model="usahas.{{ $i }}.kategori_id" class="ek-select">
                                            <option value="">Pilih kategori</option>
                                            @foreach($kategoriList as $id => $nama)
                                                <option value="{{ $id }}">{{ $nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error("usahas.$i.kategori_id") <span class="ek-error">{{ $message }}</span> @enderror
                                </div>

                                <div class="ek-field">
                                    <label class="ek-label">Nama Usaha <span class="ek-required">*</span></label>
                                    <input type="text" wire:model="usahas.{{ $i }}.namausaha" class="ek-input" placeholder="Nama usaha">
                                    @error("usahas.$i.namausaha") <span class="ek-error">{{ $message }}</span> @enderror
                                </div>

                                <div class="ek-field">
                                    <label class="ek-label">Keterangan Usaha <span class="ek-required">*</span></label>
                                    <textarea wire:model="usahas.{{ $i }}.keteranganekodigi" class="ek-textarea" placeholder="Deskripsikan usaha Anda"></textarea>
                                    @error("usahas.$i.keteranganekodigi") <span class="ek-error">{{ $message }}</span> @enderror
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            {{-- Card 04: Verifikasi --}}
            <div class="ek-card" style="animation-delay: 0.16s">
                <div class="ek-card-header">
                    <div class="ek-step">04</div>
                    <div class="ek-card-title">Verifikasi</div>
                </div>
                <div class="ek-card-body">
                    <div class="ek-turnstile-wrap">
                        <div wire:ignore>
                            <div
                                id="turnstile-widget"
                                class="cf-turnstile"
                                data-sitekey="{{ config('services.turnstile.site_key') }}"
                                data-callback="onTurnstileSuccess"
                                data-expired-callback="onTurnstileExpired"
                                data-error-callback="onTurnstileError"
                                :data-theme="theme"
                            ></div>
                        </div>
                        @error('captcha') <span class="ek-error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            {{-- Submit --}}
            <div class="ek-submit-wrap">
                <button type="submit" class="ek-submit"
                    wire:loading.attr="disabled" wire:target="submit"
                    wire:loading.class="opacity-50" wire:target="submit">
                    <span wire:loading.remove wire:target="submit">Kirim Data →</span>
                    <span wire:loading wire:target="submit">Mengirim...</span>
                </button>
            </div>

        </form>
    </div>{{-- end ek-container --}}

    {{-- Footer --}}
    <footer class="ek-footer">
        <div class="ek-footer-text">
            <span>© 2026. Made with</span>
            <span class="ek-footer-heart">♥</span>
            <span>by Tim IPJKD BPS Provinsi Kalimantan Timur.</span>
            <span class="ek-footer-version">(Versi: 1.0.0)</span>
        </div>
    </footer>

    {{-- Definisi Usaha Digital Modal --}}
    <div
        x-show="showDefinisiModal"
        x-cloak
        @click.self="showDefinisiModal = false"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        style="position:fixed; inset:0; background:#000000cc; z-index:9998; display:flex; align-items:center; justify-content:center; padding:16px; backdrop-filter:blur(4px);"
    >
        <div @click.stop style="background:var(--card-bg); border:1px solid var(--card-border); border-radius:20px; width:100%; max-width:600px; max-height:85vh; display:flex; flex-direction:column; z-index:9999; animation: modalIn 0.2s ease both;">

            {{-- Modal Header --}}
            <div style="display:flex; align-items:center; justify-content:space-between; padding:20px 24px; border-bottom:1px solid var(--card-divider); flex-shrink:0;">
                <div style="font-size:15px; font-weight:600; color:var(--card-title);">Definisi Usaha Digital</div>
                <button type="button" @click="showDefinisiModal = false"
                    style="width:32px; height:32px; border-radius:8px; border:1px solid var(--card-border); background:transparent; color:var(--label-color); cursor:pointer; display:flex; align-items:center; justify-content:center; transition: background 0.15s;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:14px;height:14px;">
                        <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                    </svg>
                </button>
            </div>

            {{-- Modal Body --}}
            <div style="padding:16px 24px 24px; overflow-y:auto; display:flex; flex-direction:column; gap:14px;">
                @foreach($kategoriListModal as $kat)
                    <div style="background:var(--usaha-bg); border:1px solid var(--usaha-border); border-radius:12px; padding:16px;">
                        <div style="font-size:13px; font-weight:700; color:#fb923c; margin-bottom:10px;">
                            {{ $kat->nmkategorikodigi }}
                        </div>
                        @if($kat->deskripsikategori)
                            <div style="font-family:'DM Mono',monospace; font-size:10px; color:#fb923c; letter-spacing:0.06em; text-transform:uppercase; margin-bottom:4px;">Definisi</div>
                            <div style="font-size:13px; color:var(--label-color); line-height:1.6; margin-bottom:10px;">{{ $kat->deskripsikategori }}</div>
                        @endif
                        @if($kat->contoh)
                            <div style="font-family:'DM Mono',monospace; font-size:10px; color:#fb923c; letter-spacing:0.06em; text-transform:uppercase; margin-bottom:4px;">Contoh</div>
                            <div style="font-size:13px; color:var(--label-color); line-height:1.6;">{{ $kat->contoh }}</div>
                        @endif
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    {{-- Turnstile JS --}}
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    <script>
        function onTurnstileSuccess(token) {
            @this.set('captcha', token);
        }
        function onTurnstileExpired() {
            @this.set('captcha', '');
        }
        function onTurnstileError() {
            @this.set('captcha', '');
        }

        document.addEventListener('livewire:initialized', () => {
            @this.on('reset-turnstile', () => {
                if (typeof turnstile !== 'undefined') {
                    turnstile.reset('#turnstile-widget');
                }
            });
        });
        // Handle Android back button to close modal
        window.addEventListener('popstate', (e) => {
            const alpine = document.querySelector('.ekodigi-wrap')?._x_dataStack?.[0];
            if (alpine && alpine.showDefinisiModal) {
                alpine.showDefinisiModal = false;
                history.pushState(null, '', window.location.href);
            }
        });

        // Push state when modal opens so back button has something to go back to
        document.addEventListener('alpine:initialized', () => {
            Alpine.effect(() => {
                const alpine = document.querySelector('.ekodigi-wrap')?._x_dataStack?.[0];
                if (!alpine) return;
                if (alpine.showDefinisiModal) {
                    history.pushState({ modal: 'definisi' }, '', window.location.href);
                }
            });
        });
    </script>
</div>{{-- end ekodigi-wrap --}}