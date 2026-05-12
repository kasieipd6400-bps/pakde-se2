<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kecamatan extends Model
{
    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'kabupaten_id',
        'idkec',
        'nmkec',
    ];

    public function kabupaten():BelongsTo{
        return $this->belongsTo(Kabupaten::class);
    }
    
}
