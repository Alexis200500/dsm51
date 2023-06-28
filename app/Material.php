<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    
    protected $table = 'materiales';

    protected $fillable = [
        'unidad_medida_id', 'material', 'abreviatura','tipo', 'estatus'
    ];

    public function unidad_medida() {
        return $this->belongsTo('App\Unidad_Medida', 'unidad_medida_id', 'id');
    }
}
