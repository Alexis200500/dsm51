<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'carreras';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'direccion_id', 'carrera', 'abreviatura', 'estatus'
    ];

    public function direccion() {
        return $this->belongsTo('App\Direccion', 'direccion_id', 'id');
    }
}
