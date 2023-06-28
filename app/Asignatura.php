<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'asignaturas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'carrera_id', 'asignatura', 'abreviatura', 'estatus'
    ];

    public function carrera() {
        return $this->belongsTo('App\Carrera', 'carrera_id', 'id');
    }
}
