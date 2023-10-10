<?php

use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class);


//*? a partir de laravel 9 se puede hacer esto de hacerlo en grupos 

Route::controller(CursoController::class)->group(function () {

    Route::get('cursos', 'index');
    Route::get('cursos/create', 'create');
    Route::get('cursos/{curso}', 'show');
});

// Route::get('cursos/{curso}/{categoria?}', function ($curso, $categoria = null) {

//     //*? el signo de interrogación es para hacer opcional la ruta
//     if ($categoria) {
//         return "bienvenido a la página cursos: $curso de la categoría $categoria";
//     }
//     return "bienvenido a la página cursos: $curso";
// });


//*? EL SNIPET DE LARAVEL SNIPETS ES Route::get Y BUSCAS EL SNIPET