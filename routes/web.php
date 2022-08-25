<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TelefonoController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\HistorialClinicoController;
use App\Http\Controllers\DetalleClinicoController;
use App\Http\Controllers\VentaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/vistaRoles/cajero', function () {
    return view('empresa.cajero.cajero');
});
Route::get('/vistaRoles/veterinario', function () {
    return view('empresa.veterinario.veterinario');
});
Route::get('/vistaRoles/peluquero', function () {
    return view('empresa.peluquero.peluquero');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/fechaVacunacion', function () {
    return view('fechaVacunacion');
});

/*Rutas login*/  
Route::get('/login', 'App\Http\Controllers\LoginController@index');
Route::get('/vistaRoles', 'App\Http\Controllers\LoginController@show');



Route::get('/contacto', 'App\Http\Controllers\ContactoController@index');

/* Route::resource('/turnos', TurnoController::class); */
Route::get('/seleccionTurno', [App\Http\Controllers\TurnoController::class,'indexTurno']);
Route::post('turnos/mostrarTurno','App\Http\Controllers\TurnoController@mostrarTurno');
Route::get('/turnos/mostrar', [App\Http\Controllers\TurnoController::class,'show']);
Route::post('/turnos/agregar', [App\Http\Controllers\TurnoController::class,'agregar']);
Route::get('turnos/cancelar/{id}',[TurnoController::class, 'cancelar'] )->name('cancelarTurno');  
Route::resource('/turnos','App\Http\Controllers\TurnoController');
route::get('/turnos/{id}/delete','App\Http\Controllers\TurnoController@destroy');
Route::get('/login', 'App\Http\Controllers\LoginController@index');

Route::get('/turnos/mensaje/{id}', [App\Http\Controllers\TurnoController::class,'mensaje']);

Route::resource('/personas','App\Http\Controllers\PersonaController');
route::get('/personas/{id}/delete','App\Http\Controllers\PersonaController@destroy');

Route::resource('/telefonos','App\Http\Controllers\TelefonoController');
route::get('/telefonos/{id}/delete','App\Http\Controllers\TelefonoController@destroy');

Route::resource('/mascotas','App\Http\Controllers\MascotaController');
route::get('/mascotas/{id}/delete','App\Http\Controllers\MascotaController@destroy');
Route::resource('/historialesClinicos','App\Http\Controllers\HistorialClinicoController');
Route::resource('/detallesClinicos','App\Http\Controllers\DetalleClinicoController');
Route::resource('/ventas','App\Http\Controllers\VentaController');

Route::get('mascotas/verMascota/{id}',[MascotaController::class,'verMascota'] )->name('verMascotas');

Route::get('telefonos/create/{id}',[TelefonoController::class, 'create'] )->name('creartelefono');
//Route::post('telefonos/editar/{id}',[TelefonoController::class, 'create'] )->name('editarTelefono');
Route::post('telefono/ver','App\Http\Controllers\TelefonoController@ver');
Route::get('mascotas/create/{id}',[MascotaController::class, 'create'] )->name('crearMascota');
Route::get('DetallesClinicos/create/{id}',[DetalleClinicoController::class, 'create'] )->name('crearDetalleClinico');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/turnos/edit', function () {
    return view('turnos');
});


/*Rutas articulos */
Route::resource('/articulos','App\Http\Controllers\ArticuloController');
 Route::post('categorias/all','App\Http\Controllers\CategoriaController@all');
 Route::post('articulos/filter','App\Http\Controllers\ArticuloController@filter');
 Route::get('Lotes/{id}/Vencimientodelete','App\Http\Controllers\loteDescripcionController@Vencimientodelete');

 /*Rutas ventas*/
Route::resource('/ventas','App\Http\Controllers\VentaController');

Route::get("ventas/{id}/delete", "App\Http\Controllers\VentaController@destroy");
//Route::get("/ventas/ticket", "VentasController@ticket")->name("ventas.ticket");
Route::get("/agregarArticuloVenta/{id}", "App\Http\Controllers\VentaController@agregarArticuloVenta");
Route::get("/eleminarUnArticuloVenta/{id}","App\Http\Controllers\VentaController@quitarUnArticuloVenta");
Route::delete("/quitarArticuloDeVenta", "App\Http\Controllers\VentaController@quitarArticuloDeVenta")->name('quitarArticulo');
Route::get("/cancelarVenta", "App\Http\Controllers\VentaController@cancelarVenta");
Route::get("/terminarVenta", "App\Http\Controllers\VentaController@terminarVenta");
Route::get("/ventas/total/{id}", "App\Http\Controllers\VentaController@ventasTotal")->name('ventasTotal');
Route::post("/ventas/confirmarVenta/{id}", "App\Http\Controllers\VentaController@confirmarVenta");

/*Rutas lote*/
Route::get('Articulos/{id}/delete','App\Http\Controllers\ArticuloController@destroy');
Route::resource('/lotes','App\Http\Controllers\loteDescripcionController');
Route::get('Lotes/{id}/delete','App\Http\Controllers\loteDescripcionController@destroy');
Route::get('Lotes/{id}/lote','App\Http\Controllers\loteDescripcionController@lote_For_Article');
Route::get('Lotes/{id}/create','App\Http\Controllers\loteDescripcionController@crear_por_id');
Route::post('Lotes/{id}/store','App\Http\Controllers\loteDescripcionController@store_por_id');
Route::get('vencimientos','App\Http\Controllers\ArticuloController@Vencimiento')->name('vencimiento');
/*Rutas historial de ventas */
Route::get('historialVenta/index','App\Http\Controllers\ventaController@historialventas');
/*Rutas de categoria */
Route::resource('/categorias','App\Http\Controllers\categoriaController');
Route::get('/quitarUnaCategoria/{id}','App\Http\Controllers\categoriaController@destroy');
/* ruta de notificacion */
Route::resource('/notificaciones','App\Http\Controllers\notificacionesController');
Route::get('/notificacion/{id}/delete','App\Http\Controllers\notificacionesController@destroy');

