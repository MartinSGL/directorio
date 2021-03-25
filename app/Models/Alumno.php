<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = ['name','apaterno','amaterno','grupo_id','usaer'];

    //relacion muchos a muchos
    public function numeros()
    {
        return $this->belongsToMany('App\Models\Numero');
    }

    //relacion muchos a muchos
    public function usaers()
    {
        return $this->belongsToMany('App\Models\Usaer');
    }

    //relacion uno a muchos inversa
    public function grupo()
    {
        return $this->belongsTo('App\Models\Grupo');
    }
}
