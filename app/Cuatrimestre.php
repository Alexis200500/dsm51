<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuatrimestre extends Model
{
    public static function validationRules() {
        return [
            'cuatrimestre' => 'required|min:5|max:100',
            'fecha_inicio'  ,
            'fecha_termino' ,
        ];
    }

    public static function attributeNames() {
        return [
            'cuatrimestre' => 'cuatrimestre',
            'fecha_inicio' => 'fecha_inicio',
            'fecha_termino' => 'fecha_termino',
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
    protected $table = 'cuatrimestres';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cuatrimestre', 'fecha_inicio', 'fecha_termino'
    ];
}
