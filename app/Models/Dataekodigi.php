<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dataekodigi extends Model
{
    protected $fillable = [
        'id',
        'sls_id',
        'namapemilik',
        //'jmlusaha',
        'kategori_id',
        'namausaha',
        'keteranganekodigi',
        'alamatusaha', 
        'kabupaten_id'   
        
    ];
    
    public function kabupaten():BelongsTo{
        return $this->belongsTo(Kabupaten::class);
    }
    public function sls():BelongsTo{
        return $this->belongsTo(Sls::class);
    }
    public function kategori():BelongsTo{
        return $this->belongsTo(Kategori::class);
    }
    
}
