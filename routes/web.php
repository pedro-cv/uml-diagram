<?php

use App\Http\Controllers\DiagramaController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ScriptsController;
use App\Mail\notificacion;
use App\Models\User;
use App\Notifications\c4notificacion;
use Facade\Ignition\Http\Controllers\ScriptController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuarios', function () {
    $users = User::all();
    return response(User::all(), 200);
});

Route::middleware('auth')->group(function () {
    Route::get('/home', function(){
        $usuario = User::find(Auth::user()->id);
        $proyectos = $usuario->proyectos()->where('favorito', 1)->paginate(5);
        return view('home', compact('proyectos'));
    })->name('dashboard');



    Route::get('/notificadoxd', function(){
        
        $user = Auth::user();
        $cadena = substr($user->email, 0, strpos($user->email, '@'));
        //$notificacion = modelonoti::find(1);
        $url = 'http://c4diagram.test/diagramar/1';
        $notificacion = [
            'subject' =>'Inivitacion Proyecto: XD',
            'saludo' => 'Hola que tal '.$user->name,
            'contenido' => auth()->user()->name.' le envió esta invitación',
            'botonTexto' => 'Ingresar al proyecto',
            'url' => $url,
            'nota' => 'linea ultima'
        ];
        
        Notification::send( $user, new c4notificacion( $notificacion));
        return 'correo: '.$cadena;
    
    });


    Route::get('Profile/', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('Profile/{user}/update', [ProfileController::class, 'update'])->name('profile.update');

    /* Proyectos */
    Route::put('Leer-Notificacion/{notificacion}', [NotificacionController::class, 'leer'])->name('notificaciones.leer');
    Route::get('proyectos-usuarios/{proyecto}', [ProyectoController::class, 'usuarios'])->name('proyectos.usuarios');
    Route::post('proyectos/favorito', [ProyectoController::class, 'favorito']);
    Route::post('proyectos/terminado', [ProyectoController::class, 'terminado']);
    Route::resource('proyectos', ProyectoController::class);
    Route::put('Declinar-Proyecto/{proyecto}', [ProyectoController::class, 'declinar'])->name('proyectos.declinar');
    Route::put('Banear-Proyecto/{proyecto}', [ProyectoController::class, 'banear'])->name('proyectos.banear');
    /* Diagramas */
    Route::post('diagramas/exportar', [DiagramaController::class, 'exportar'])->name('exportar');
    Route::post('diagramas/architec', [DiagramaController::class, 'architect'])->name('architect');
    Route::get('diagramas/{diagrama}/descargar', [DiagramaController::class, 'descargar'])->name('diagramas.descargar');
    Route::put('Banear-Diagrama/{diagrama}', [DiagramaController::class, 'banear'])->name('diagramas.banear');
    Route::get('digramas/{diagrama}/usuarios', [DiagramaController::class, 'usuarios'])->name('diagramas.usuarios');
    Route::post('diagramas/agregar-usuario', [DiagramaController::class, 'agregar'])->name('diagramas.agregarUsuario');
    Route::get('diagramar/{diagrama}',[DiagramaController::class, 'diagramar'])->name('diagramas.diagramar');
    Route::get('diagramas/',[DiagramaController::class, 'misDiagramas'])->name('diagramas.misDiagramas');
    Route::post('diagramas/editor', [DiagramaController::class, 'editor']);
    Route::post('diagramas/guardar', [DiagramaController::class, 'guardar']);
    Route::post('diagramas/favorito', [DiagramaController::class, 'favorito']);
    Route::post('diagramas/terminado', [DiagramaController::class, 'terminado']);
    Route::get('diagramas/{proyecto}', [DiagramaController::class, 'index'])->name('diagramas.index');
    Route::get('diagramas/{diagrama}/edit', [DiagramaController::class, 'edit'])->name('diagramas.edit');
    Route::put('diagramas/{diagrama}/update', [DiagramaController::class, 'update'])->name('diagramas.update');
    Route::post('diagramas/', [DiagramaController::class, 'store'])->name('diagramas.store');

    Route::get('scriptsMysql/{id}', [ScriptsController::class, 'scriptMysql'])->name('script.mysql');
    Route::get('scriptsSqlServer/{id}', [ScriptsController::class, 'scriptSqlServer'])->name('script.sqlserver');
    Route::get('scriptsPgsql/{id}', [ScriptsController::class, 'scriptPgsql'])->name('script.pgsql');
    Route::get('generateViews/{id}', [ScriptsController::class, 'viewHTML'])->name('viewhtml');

    /* Notificaciones */
    Route::post('notificar', [NotificacionController::class, 'notificar'])->name('notificar');
    Route::resource('notificaciones', NotificacionController::class);
    
});

require __DIR__.'/auth.php';
