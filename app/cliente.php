<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cliente extends Model
{
    use SoftDeletes;

    protected $fillable = ['nombre','cedula','correo','telefono','obser','img'];
    protected $dates = ['deleted_at'];


    public function servicios(){
        return $this->belongsToMany('\App\servicio','cliente_servicio')
            ->withPivot('servicio_id');
    }

    
}
