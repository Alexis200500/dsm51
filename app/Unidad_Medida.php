<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad_Medida extends Model
{
    public static function validationRules() {
        return [
            'unidad_medida' => 'required|min:5|max:100',
            'abreviatura' => 'required|min:1|max:10',
            'estatus' => 'required|in:' . implode(',', self::opcionesEstatus()),
        ];
    }

    public static function attributeNames() {
        return [
            'unidad_medida' => 'dirección',
            'abreviatura' => 'abreviatura',
            'estatus' => 'estatus',
        ];
    }

    public static function opcionesEstatus() {
        return [
            'Activo' => 'Activo'
            , 'Inactivo' => 'Inactivo'
        ];
    }

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'unidades_medidas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unidad_medida', 'abreviatura', 'estatus'
    ];
}
