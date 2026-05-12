<?php

namespace App\Livewire;

use App\Models\Dataekodigi;
use App\Models\Desa;
use App\Models\Kabupaten;
use App\Models\Kategori;
use App\Models\Kecamatan;
use App\Models\Provinsi;
use App\Models\Sls;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PublicEkodigi extends Component
{
    public $provinsi_id  = '';
    public $kabupaten_id = '';
    public $kecamatan_id = '';
    public $desa_id      = '';
    public $sls_id       = '';
    public $namapemilik  = '';
    public $alamatusaha  = '';
    public $jmlusaha     = 1;
    public string $captcha = '';
    public array $usahas = [
        ['kategori_id' => '', 'namausaha' => '', 'keteranganekodigi' => ''],
    ];

    public function updatedProvinsiId()  { $this->kabupaten_id = $this->kecamatan_id = $this->desa_id = $this->sls_id = ''; }
    public function updatedKabupatenId() { $this->kecamatan_id = $this->desa_id = $this->sls_id = ''; }
    public function updatedKecamatanId() { $this->desa_id = $this->sls_id = ''; }
    public function updatedDesaId()      { $this->sls_id = ''; }

    public function updatedJmlusaha($value)
    {
        $jumlah  = max(1, min(99, (int) $value));
        $current = count($this->usahas);
        if ($jumlah > $current) {
            for ($i = $current; $i < $jumlah; $i++) {
                $this->usahas[] = ['kategori_id' => '', 'namausaha' => '', 'keteranganekodigi' => ''];
            }
        } else {
            $this->usahas = array_slice($this->usahas, 0, $jumlah);
        }
    }

    protected function rules(): array
    {
        $rules = [
            'provinsi_id'  => 'required',
            'kabupaten_id' => 'required',
            'kecamatan_id' => 'required',
            'desa_id'      => 'required',
            'sls_id'       => 'required',
            'namapemilik'  => 'required|string|max:255',
            'alamatusaha'  => 'required|string',
            'jmlusaha'     => 'required|integer|min:1|max:99',
            'usahas'       => 'required|array|min:1',
            'captcha'      => 'required',
        ];
        foreach ($this->usahas as $i => $_) {
            $rules["usahas.$i.kategori_id"]       = 'required';
            $rules["usahas.$i.namausaha"]          = 'required|string|max:255';
            $rules["usahas.$i.keteranganekodigi"]  = 'required|string';
        }
        return $rules;
    }

    protected function messages(): array
    {
        return [
            'provinsi_id.required'                => 'Provinsi wajib dipilih.',
            'kabupaten_id.required'               => 'Kabupaten wajib dipilih.',
            'kecamatan_id.required'               => 'Kecamatan wajib dipilih.',
            'desa_id.required'                    => 'Desa/Kelurahan wajib dipilih.',
            'sls_id.required'                     => 'SLS wajib dipilih.',
            'namapemilik.required'                => 'Nama pemilik wajib diisi.',
            'alamatusaha.required'                => 'Alamat usaha wajib diisi.',
            'usahas.*.kategori_id.required'       => 'Kategori wajib dipilih.',
            'usahas.*.namausaha.required'         => 'Nama usaha wajib diisi.',
            'usahas.*.keteranganekodigi.required' => 'Keterangan wajib diisi.',
            'captcha.required'                    => 'Verifikasi captcha wajib diselesaikan.',
        ];
    }

    public function submit()
    {
        $this->validate();

        // Verify Turnstile token with Cloudflare
        $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret'   => config('services.turnstile.secret_key'),
            'response' => $this->captcha,
            'remoteip' => request()->ip(),
        ]);

        if (! $response->json('success')) {
            $this->addError('captcha', 'Verifikasi captcha gagal. Silakan coba lagi.');
            // Reset token so widget re-renders
            $this->captcha = '';
            $this->dispatch('reset-turnstile');
            return;
        }

        foreach ($this->usahas as $usaha) {
            Dataekodigi::create([
                'kabupaten_id'      => $this->kabupaten_id,
                'sls_id'            => $this->sls_id,
                'namapemilik'       => $this->namapemilik,
                'alamatusaha'       => $this->alamatusaha,
                'kategori_id'       => $usaha['kategori_id'],
                'namausaha'         => $usaha['namausaha'],
                'keteranganekodigi' => $usaha['keteranganekodigi'],
            ]);
        }

        return redirect()->route('public-ekodigi.succes');
    }

    public function render()
    {
        return view('public-ekodigi', [
            'provinsiList'  => Provinsi::orderBy('nmprov')->pluck('nmprov', 'id'),
            'kabupatenList' => $this->provinsi_id  ? Kabupaten::where('provinsi_id', $this->provinsi_id)->orderBy('id')->pluck('nmkab', 'id') : [],
            'kecamatanList' => $this->kabupaten_id ? Kecamatan::where('kabupaten_id', $this->kabupaten_id)->orderBy('id')->pluck('nmkec', 'id') : [],
            'desaList'      => $this->kecamatan_id ? Desa::where('kecamatan_id', $this->kecamatan_id)->orderBy('id')->pluck('nmdesa', 'id') : [],
            'slsList'       => $this->desa_id      ? Sls::where('desa_id', $this->desa_id)->orderBy('id')->pluck('nmsls', 'id') : [],
            'kategoriList'  => Kategori::orderBy('id')->pluck('nmkategorikodigi', 'id'),
            'kategoriListModal' => Kategori::orderBy('id')->get(['id', 'nmkategorikodigi', 'contoh', 'deskripsikategori']),
        ]);
    }
}
