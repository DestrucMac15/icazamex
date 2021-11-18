<?php

use App\Http\Controllers\CatalogosController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DesarrollosController;
use App\Http\Controllers\ImagenesController;
use App\Http\Controllers\InmueblesController;
use App\Http\Controllers\InversionesController;
use App\Http\Controllers\InversionItemController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PropiedadesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WebController::class, 'index'])->name('web.index');
Route::get('/web/inmuebles', [WebController::class, 'inmuebles'])->name('web.inmuebles');
//Route::get('/web/desarrollos', [WebController::class, 'desarrollos'])->name('web.desarrollos');
Route::get('/web/desarrollos/{desarrollo?}', [WebController::class, 'desarrollosParticular'])->name('web.desarrollosParticular');
//Route::get('/web/propiedades', [WebController::class, 'propiedades'])->name('web.propiedades');
Route::get('/web/propiedades/{propiedad?}', [WebController::class, 'propiedadesParticular'])->name('web.propiedadesParticular');
Route::get('/web/inversiones', [WebController::class, 'inversiones'])->name('web.inversiones');
Route::get('/web/inversiones/{inversion}', [WebController::class, 'inversionesParticular'])->name('web.inversionesParticular');
Route::get('/web/preguntas-frecuentes', [WebController::class, 'preguntasFrecuentes'])->name('web.preguntasFrecuentes');
Route::get('/web/contacto', [ContactoController::class, 'index'])->name('web.contacto');
Route::post('/web/contacto', [ContactoController::class, 'store'])->name('web.contactoStore');
Route::get('/web/registro', [WebController::class, 'registro'])->name('web.registro');
Route::get('/web/login', [WebController::class, 'login'])->name('web.login');
Route::get('/web/terminos-y-condiciones', [WebController::class, 'terminos'])->name('web.terminos');
Route::get('/web/aviso-de-privacidad', [WebController::class, 'aviso'])->name('web.aviso');
Route::get('/web/blog', [WebController::class, 'blog'])->name('web.blog');
Route::get('/web/blog/{slug}', [WebController::class, 'blogParticular'])->name('web.blogParticular');
Route::get('web/promociones', [WebController::class, 'promociones'])->name('web.promociones');



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //rutas para propiedades
    Route::resource('propiedades', PropiedadesController::class);
    Route::get('propiedades/table/data', [PropiedadesController::class, 'table'])->name('propiedades.table.data');

    //rutas para desarrollos
    Route::resource('desarrollos', DesarrollosController::class);
    Route::get('desarrollos/table/data', [DesarrollosController::class, 'table'])->name('desarrollos.table.data');

    //rutas para inversiones
    Route::resource('inversiones', InversionesController::class);
    Route::get('inversiones/table/data', [InversionesController::class, 'table'])->name('inversiones.table.data');

    Route::resource('inversiones-item', InversionItemController::class);
    Route::get('inversiones-item/table/data', [InversionItemController::class, 'table'])->name('inversiones-item.table.data');

    Route::resource('imagenes', ImagenesController::class);

    Route::resource('blog', PostsController::class);
    Route::get('blog/table/data', [PostsController::class, 'table'])->name('blog.table.data');

    Route::resource('users', UsersController::class);
    Route::get('users/table/data', [UsersController::class, 'table'])->name('users.table.data');
    Route::get('users/permissions/data', [UsersController::class, 'permissions'])->name('users.permissions.data');
    Route::get('users/asesores/data', [UsersController::class, 'asesores'])->name('users.asesores.data');

    Route::group(['prefix' => 'ajax'], function () {
        Route::get('catalogos/estados', [CatalogosController::class, 'estados'])->name('catalogos.estados');
        Route::get('catalogos/municipios', [CatalogosController::class, 'municipios'])->name('catalogos.municipios');
        Route::get('catalogos/localidades', [CatalogosController::class, 'localidades'])->name('catalogos.localidades');
        Route::get('catalogos/todos', [CatalogosController::class, 'todos'])->name('catalogos.todos');
        Route::get('catalogos/caracteristicas', [CatalogosController::class, 'caracteristicas'])->name('catalogos.caracteristicas');
    });
});

require __DIR__.'/auth.php';
