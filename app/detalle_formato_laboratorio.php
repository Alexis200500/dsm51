<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalle_formato_laboratorio extends Model
{
    public $timestamps = false;
    public static function validationRules() {
        return [
            'formato_laboratorio_id'=>'required|integer' ,
            'material_id' =>'required|integer',
            'unidad_medida_id' =>'required|integer',
            'cantidad'=>'required|integer',
        ];
    }

    public static function attributeNames() {
        return [
            'formato_laboratorio_id'=>'formato_laboratorio_id' ,
            'material_id' =>'material_id',
            'unidad_medida_id' =>'unidad_medida_id',
            'cantidad'=>'cantidad',
        ];
    }

    protected $table = 'detalle_formato_laboratorio';

    protected $fillable = [
        'formato_laboratorio_id' ,
        'material_id' ,
        'unidad_medida_id' ,
        'cantidad',

    ];

    public function formato_laboratorio() {
        return $this->belongsTo('App\Formato_Laboratorio', 'formato_laboratorio_id', 'id');
    }

    public function material() {
        return $this->belongsTo('App\Material', 'material_id', 'id');
    }

    public function unidad_medida() {
        return $this->belongsTo('App\Unidad_Medida', 'unidad_medida_id', 'id');
    }

}
