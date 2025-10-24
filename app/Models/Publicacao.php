<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class publicacao extends Model
{
    //
    protected $table = 'publicacao';
    protected $fillable = ['foto','titulo_prato','local','cidade','empresa_id'];
    public $timestamps = false;

    public function empresa() {
            return $this->belongsTo(Empresa::class,'empresa_id');                      
        }
}
