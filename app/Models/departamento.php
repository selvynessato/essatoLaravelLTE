<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    /*protected $table = 'departamento';
    //relacion uno a muchos
    public function municipio(){
        return $this->hasMany(App\Models\municipio);
    }  
    
    //relacion uno a muchos
    public function direccion(){
        return $this->hasMany(App\Models\direccion);
    }*/

    protected $table = 'departamento';

    public function municipios()
    {
        return $this->hasMany(Municipio::class, 'id_departamento', 'id_departamento');
    }
}