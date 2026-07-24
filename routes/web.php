<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\CotizacionesController;
use App\Http\Controllers\Panel\ServiciosController;
use App\Http\Controllers\Panel\AutorizacionesCancelacionController;
use App\Http\Controllers\Panel\FacturacionController;
use App\Http\Controllers\Panel\ClientesController;
use App\Http\Controllers\Panel\AseguradorasController;
use App\Http\Controllers\Panel\TiposServicioController;
use App\Http\Controllers\Panel\ConveniosController;
use App\Http\Controllers\Panel\TarifasPropiasController;
use App\Http\Controllers\Panel\OficinasController;
use App\Http\Controllers\Panel\UnidadesController;
use App\Http\Controllers\Panel\MantenimientosController;
use App\Http\Controllers\Panel\EmpleadosController;
use App\Http\Controllers\Panel\OperadoresController;
use App\Http\Controllers\Panel\UsuariosController;
use App\Http\Controllers\Panel\ConfiguracionController;
use App\Http\Controllers\Panel\IntegracionesController;
use App\Http\Controllers\ContactoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index']);

Route::post('/contacto', [ContactoController::class, 'store']);

Route::get('/solicitar', [LandingController::class, 'solicitar']);
Route::get('/rastrear', [LandingController::class, 'rastrear']);
Route::get('/soporte', [LandingController::class, 'soporte']);

Route::middleware(['auth'])->prefix('panel')->name('panel.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware('role:admin,cotizador')->group(function () {
        Route::get('/cotizaciones', [CotizacionesController::class, 'index'])->name('cotizaciones.index');
        Route::get('/cotizaciones/create', [CotizacionesController::class, 'create'])->name('cotizaciones.create');
        Route::post('/cotizaciones', [CotizacionesController::class, 'store'])->name('cotizaciones.store');
        Route::get('/cotizaciones/{id}', [CotizacionesController::class, 'show'])->name('cotizaciones.show');
        Route::get('/facturacion', [FacturacionController::class, 'index'])->name('facturacion.index');
    });

    Route::middleware('role:admin,cotizador,operador')->group(function () {
        Route::get('/servicios', [ServiciosController::class, 'index'])->name('servicios.index');
        Route::get('/servicios/{id}', [ServiciosController::class, 'show'])->name('servicios.show');
        Route::get('/autorizaciones-cancelacion', [AutorizacionesCancelacionController::class, 'index'])->name('autorizaciones-cancelacion.index');
    });

    Route::middleware('role:admin,cotizador')->group(function () {
        Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes.index');
        Route::get('/clientes/{id}', [ClientesController::class, 'show'])->name('clientes.show');
        Route::get('/aseguradoras', [AseguradorasController::class, 'index'])->name('aseguradoras.index');
        Route::get('/aseguradoras/{id}', [AseguradorasController::class, 'show'])->name('aseguradoras.show');
        Route::get('/convenios', [ConveniosController::class, 'index'])->name('convenios.index');
        Route::get('/convenios/{id}', [ConveniosController::class, 'show'])->name('convenios.show');
        Route::get('/tarifas-propias', [TarifasPropiasController::class, 'index'])->name('tarifas-propias.index');
        Route::get('/reportes', [ReportesController::class, 'index'])->name('reportes.index');
    });

    Route::middleware('role:admin')->group(function () {
        Route::get('/tipos-servicio', [TiposServicioController::class, 'index'])->name('tipos-servicio.index');
        Route::get('/convenios/create', [ConveniosController::class, 'create'])->name('convenios.create');
        Route::post('/convenios', [ConveniosController::class, 'store'])->name('convenios.store');
        Route::get('/convenios/{id}/edit', [ConveniosController::class, 'edit'])->name('convenios.edit');
        Route::put('/convenios/{id}', [ConveniosController::class, 'update'])->name('convenios.update');
        Route::get('/oficinas', [OficinasController::class, 'index'])->name('oficinas.index');
        Route::get('/unidades', [UnidadesController::class, 'index'])->name('unidades.index');
        Route::get('/mantenimientos', [MantenimientosController::class, 'index'])->name('mantenimientos.index');
        Route::get('/empleados', [EmpleadosController::class, 'index'])->name('empleados.index');
        Route::get('/operadores', [OperadoresController::class, 'index'])->name('operadores.index');
        Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');
        Route::get('/configuracion', [ConfiguracionController::class, 'index'])->name('configuracion.index');
        Route::post('/configuracion', [ConfiguracionController::class, 'update'])->name('configuracion.update');
        Route::post('/upload', [UploadController::class, 'store'])->name('upload.store');
        Route::get('/integraciones', [IntegracionesController::class, 'index'])->name('integraciones.index');
        Route::get('/notificaciones', [NotificacionesController::class, 'index'])->name('notificaciones.index');
    });

    Route::get('/mi-perfil', [PerfilController::class, 'index'])->name('mi-perfil');
});

require __DIR__.'/auth.php';
