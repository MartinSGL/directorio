<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Numero extends Model
{
    use HasFactory;

    protected $fillable = ['numero'];

    //relacion muchos a muchos
    public function alumnos()
    {
        return $this->belongsToMany('App\Models\Alumno');
    }
}
