<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EquipoController; 


Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('registro', 'registro')->name('registro');
    Route::post('registro', 'registroSave')->name('registro.save');

    Route::get('login', 'login')->name('login'); 
    Route::post('login', 'loginAction')->name('login.action'); 

    // Route::get('logout', [AuthController::class, 'logoutAction'])->middleware('auth')->name('logout.action');
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
    
}); 

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('auth.dashboard'); // Cambia esto para apuntar a la vista en auth
    })->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');




    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('products');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show'); 
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
    });

    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->middleware('auth')->name('profile');


    Route::controller(SaleController::class)->prefix('ventas')->group(function () {
        Route::get('create', 'create')->name('ventas.create'); // Ruta para el formulario de ventas
        Route::post('store', 'store')->name('ventas.store'); // Ruta para guardar la venta
        Route::get('', 'index')->name('ventas.index'); // Ruta para listar las ventas
    });
    


});

Route::middleware('auth')->group(function () {
    Route::get('/operacion', function () {
        return view('operations.operacion');
    })->name('operacion');
});

Route::middleware('auth')->prefix('operations')->name('operations.')->group(function () {
    Route::controller(OperationController::class)->group(function () {
        Route::get('operacion')->name('operacion');
    });

});


// Route::get('operaciones/ventas', function () {
//     return view('operations.ventas');
// })->name('ventas');

// Grupo de rutas para las operaciones
Route::prefix('operaciones')->group(function () {
    Route::get('ventas', function () {
        return view('operations.ventas'); // Ruta para mostrar la vista principal de ventas
    })->name('ventas');

});
Route::prefix('operaciones')->group(function () {
    Route::get('facturas', function () {
        return view('operations.facturas'); // Cambia la ubicación según tu carpeta
    })->name('facturas');
});

Route::prefix('ventas')->group(function () {
    Route::get('ventas', [SaleController::class, 'ventas'])->name('ventas');
    Route::get('registrar', [SaleController::class, 'create'])->name('ventas.registrar');
    Route::post('guardar', [SaleController::class, 'store'])->name('ventas.guardar');
    Route::get('listar', [SaleController::class, 'index'])->name('ventas.listar');
    Route::get('editar/{id}', [SaleController::class, 'edit'])->name('ventas.edit');
    Route::put('actualizar/{id}', [SaleController::class, 'update'])->name('ventas.update'); 
    Route::get('eliminar/{id}', [SaleController::class, 'destroy'])-> name('ventas.destroy');
});

Route::prefix('facturas')->group(function () {
    Route::get('facturas', [FacturaController::class, 'factura'])->name('facturas');
    Route::get('registrar', [FacturaController::class, 'create'])->name('facturas.registrar');
    Route::POST('guardar', [FacturaController::class, 'store'])->name('facturas.guardar');
    Route::get('listar', [FacturaController::class, 'listar'])->name('facturas.listar');
});


// Route::prefix('facturas')->group(function () {
//     Route::get('registrar', function () {
//         // $clientes = Cliente::all(); // Asegúrate de tener el modelo Cliente importado
//         return view('operations.facturas.registrarFactura', compact('clientes'));
//     })->name('facturas.registrar');

//     Route::post('guardar', [FacturaController::class, 'store'])->name('facturas.guardar');
// });


// En routes/web.php
Route::get('equipos/search', [EquipoController::class, 'search'])->name('equipos.search');
