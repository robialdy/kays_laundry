<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\direktur\PaketController;
use App\Http\Controllers\direktur\UserController;
use Illuminate\Support\Facades\Route;

// user
use App\Http\Controllers\kurir\DashboardController as UDashboardController;
// direktur
use App\Http\Controllers\direktur\CabangController;
use App\Http\Controllers\direktur\DashboardController as DDashboardController;
use App\Http\Controllers\direktur\LayananController;
// kurir
use App\Http\Controllers\kurir\DashboardController as KDashboardController;
// operator cabang
use App\Http\Controllers\operatorCabang\DashboardController as OcDashboardController;
// pelaksana cabang
use App\Http\Controllers\pelaksanaCabang\DashboardController as PcDashboardController;



Route::get('/', function () {
    // return view('template.template-direktur');
    // landing page ini
});

// customer
Route::middleware(['auth', 'role:C'])->group(function () {

    });
// end customer

// direktur
Route::middleware(['auth', 'role:D'])->group(function(){
    Route::prefix('direktur')->group(function () {
        // dashboard direktur
        Route::get('', [DDashboardController::class, 'index'])->name('dashboard.direktur');

        // CABANG
        Route::prefix('cabang')->group(function () {
            Route::get('', [CabangController::class, 'index'])->name('cabang');
            // create
            Route::get('create', [CabangController::class, 'create'])->name('cabang.create');
            Route::post('store', [CabangController::class, 'store'])->name('cabang.store');
            // edit
            Route::get('edit/{kode}', [CabangController::class, 'edit'])->name('cabang.edit');
            Route::put('update/{id}', [CabangController::class, 'update'])->name('cabang.update');
            // delete
            Route::delete('delete/{id}', [CabangController::class, 'delete'])->name('cabang.delete');
        });

        // LAYANAN
        Route::prefix('layanan')->group(function () {
            Route::get('', [LayananController::class, 'index'])->name('layanan');
            // create
            Route::get('create', [LayananController::class, 'create'])->name('layanan.create');
            Route::post('store', [LayananController::class, 'store'])->name('layanan.store');
            // edit
            Route::get('edit/{no_layanan}', [LayananController::class, 'edit'])->name('layanan.edit');
            Route::put('update/{id}', [LayananController::class, 'update'])->name('layanan.update');
            // delete
            Route::delete('delete/{id}', [LayananController::class, 'delete'])->name('layanan.delete');
        });

        // USER
        Route::prefix('user')->group(function () {
            Route::get('', [UserController::class, 'index'])->name('user');
            // create
            Route::get('create', [UserController::class, 'create'])->name('user.create');
            Route::post('store', [UserController::class, 'store'])->name('user.store');
            // edit
            Route::get('edit/{slug}', [UserController::class, 'edit'])->name('user.edit');
            Route::put('update/{id}', [UserController::class, 'update'])->name('user.update');
            // delete
            Route::delete('delete/{id}', [UserController::class, 'delete'])->name('user.delete');
        });

        // PAKET
        Route::prefix('paket')->group(function(){
            Route::get('', [PaketController::class, 'index'])->name('paket');
            // create
            Route::get('create', [PaketController::class, 'create'])->name('paket.create');
            Route::post('store', [PaketController::class, 'store'])->name('paket.store');
            // edit
            Route::get('edit/{id}', [PaketController::class, 'edit'])->name('paket.edit');
            Route::put('update/{id}', [PaketController::class, 'update'])->name('paket.update');
            // delete
            Route::delete('delete/{id}', [PaketController::class, 'delete'])->name('paket.delete');
        });
        
    });
});

// kurir
Route::middleware(['auth', 'role:K'])->group(function () {
    Route::prefix('kurir')->group(function () {
        Route::get('', [KDashboardController::class, 'index'])->name('dashboard.kurir');
    });
});


// operator cabang
Route::middleware(['auth', 'role:OC'])->group(function () {
    Route::prefix('operator-cabang')->group(function () {
        Route::get('', [OcDashboardController::class, 'index'])->name('dashboard.operator-cabang');
    });
});

// pelaksana cabang
Route::middleware(['auth', 'role:PC'])->group(function () {
    Route::prefix('pelaksana-cabang')->group(function () {
        Route::get('', [PcDashboardController::class, 'index'])->name('dashboard.pelaksana-cabang');
    });
});

// auth
Route::prefix('auth')->group(function(){
    Route::get('', [AuthController::class, 'index'])->name('login');
    // proses login
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    // register
    Route::get('register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('register/sign-in', [AuthController::class, 'registerSignIn'])->name('auth.register.sign-in');
    // logout
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
});
