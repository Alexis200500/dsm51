<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiaFeriado extends Model
{
    protected $table = 'dias_feriados';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id'
    ];

}
