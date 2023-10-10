<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //*? invoke es cuando queremos que el controlador administre una única ruta 
    public function __invoke(){
    return view('home'); 
    }
}
