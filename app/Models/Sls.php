<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sls extends Model
{
    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'desa_id',
        'idsls',
        'nmsls',
    ];
    
    public function desa():BelongsTo{
        return $this->belongsTo(Desa::class);
    }
    
}
