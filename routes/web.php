<?php

use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\CursoController;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Mail;

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

Route::get('/', HomeController::class)->name('home');


//*? a partir de laravel 9 se puede hacer esto de hacerlo en grupos 

// Route::controller(CursoController::class)->group(function () {

//     Route::get('cursos', 'index')->name('cursos.index');
//     Route::get('cursos/create', 'create')->name('cursos.create');
//     Route::post('cursos', 'store')->name('cursos.store');
//     Route::get('cursos/{curso}', 'show')->name('cursos.show');
//     Route::get('cursos/{curso}/edit', 'edit')->name('cursos.edit');
//     Route::put('cursos/{curso}', 'update')->name('cursos.update');
//     Route::delete('cursos/{curso}', 'destroy')->name('cursos.destroy');
// });

//*? EL SNIPET DE LARAVEL SNIPETS ES Route::get Y BUSCAS EL SNIPET
//*! con esto te ahorras todo el desmadre de arriba y asigna el nombre conforme a su función y url 
// Route::resource('asignaturas', CursoController::class)->parameters(['asignaturas'=> 'curso'])->names('cursos'); 
//*! esto está asi para ejemplificar en caso que quieras cambiar el url no debas cambiar uno por uno, originalmente era cursos 
//*! ahora es asignaturas pero se le asigna el nombre cursos a los enlaces dentro de los views 
//*! parameters es para asignar también los nombres de las variables ejem $curso 
//* fue explicación lo devolvemos a como estaba 
Route::resource('cursos', CursoController::class);

Route::view('nosotros', 'nosotros')->name('nosotros');

// Route::get('contactanos', function(){
// Mail::to('marianne.garridom@gmail.com')
//     ->send(new ContactanosMailable);
// return "Mensaje Enviado";
// })->name('contactanos');


Route::controller(ContactanosController::class)->group(function () {
    Route::get('contactanos', 'index')->name('contactanos.index');
    Route::post('contactanos', 'store')->name('contactanos.store');
});

