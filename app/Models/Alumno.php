<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = ['name','apaterno','amaterno','grupo_id','numero','numero_tutor'];

    //relacion muchos a muchos
    public function usaers()
    {
        return $this->belongsToMany('App\Models\Usaer')->withTimestamps();
    }

    //relacion uno a muchos inversa
    public function grupo()
    {
        return $this->belongsTo('App\Models\Grupo');
    }

    //nombre completo
    public function getFullNameAttribute()
    {
        return "{$this->apaterno} {$this->amaterno} {$this->name}";
    }
}
