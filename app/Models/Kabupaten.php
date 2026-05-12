<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kabupaten extends Model
{
    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'provinsi_id',
        'idkab',
        'nmkab',
    ];

    public function provinsi():BelongsTo
    {
        return $this->belongsTo(Provinsi::class);
    }
    

}
