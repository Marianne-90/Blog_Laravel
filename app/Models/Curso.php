<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'name',
    //     'description',
    //     'categoria',
    // ];

    //*? esto es al revés del otro entonces ocupa menos líneas 
    protected $guarded = [];
    
    //*? ve al controlador fíjate como se le pasa $curso en compact de forma natural eso significa que en la ruta 
    //*? va a aparecer el id pero nosotros queremos rutas amigables con el nombre entonces esto sirve para eso 

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
