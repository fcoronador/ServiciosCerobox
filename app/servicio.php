<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class servicio extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nombre',
        'img',
        'Tservcio',
        'FechaIni',
        'FechaFin',
        'obser'
    ];
    protected $dates = ['deleted_at'];
}
