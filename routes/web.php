<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\client\IndexController::class, 'index'])->name('client');
Route::get('/services', [\App\Http\Controllers\client\ServiceController::class, 'index'])->name('client.services');
Route::prefix('motels')->group(function () {
    Route::get('/', [\App\Http\Controllers\client\MotelController::class, 'index'])->name('client.motels');
    Route::get('/detail/{id}', [\App\Http\Controllers\client\MotelController::class, 'detail'])->name('client.motels.detail');
    Route::post('/rent', [\App\Http\Controllers\client\SubmitController::class, 'onSubmit'])->name('client.submits.send');
});
Route::get('/blog', [\App\Http\Controllers\client\BlogController::class, 'index'])->name('client.blog');
Route::get('/contact', [\App\Http\Controllers\client\ContactController::class, 'index'])->name('client.contact');
Route::get('/client/lookup', [\App\Http\Controllers\client\LookUpController::class, 'index'])->name('client.lookup');
Route::get('/client/lookup/get', [\App\Http\Controllers\client\LookUpController::class, 'onSearch'])->name('client.lookup.get');

Route::prefix('dashboard')->group(function (){
    Route::get('/', [\App\Http\Controllers\dashboard\IndexController::class, 'index'])->name('dashboard')->middleware('auth');
    Route::get('/login', [\App\Http\Controllers\dashboard\AuthController::class, 'index'])->name('dashboard.auth.login');
    Route::post('/login', [\App\Http\Controllers\dashboard\AuthController::class, 'onLogin'])->name('dashboard.auth.onLogin');
    Route::get('/logout', [\App\Http\Controllers\dashboard\AuthController::class, 'onLogout'])->name('dashboard.auth.onLogout');
    Route::prefix('users')->middleware('auth')->group(function () {
        Route::get('/', [\App\Http\Controllers\dashboard\UserController::class, 'index'])->name('dashboard.users');
        Route::get('/create', [\App\Http\Controllers\dashboard\UserController::class, 'create'])->name('dashboard.users.create');
        Route::post('/create', [\App\Http\Controllers\dashboard\UserController::class, 'store'])->name('dashboard.users.store');
        Route::get('/edit/{id}', [\App\Http\Controllers\dashboard\UserController::class, 'edit'])->name('dashboard.users.edit');
        Route::put('/update/{id}', [\App\Http\Controllers\dashboard\UserController::class, 'update'])->name('dashboard.users.update');
        Route::delete('/delete/{id}', [\App\Http\Controllers\dashboard\UserController::class, 'destroy'])->name('dashboard.users.destroy');
    });
    Route::prefix('motels')->middleware('auth')->group(function () {
        Route::get('/', [\App\Http\Controllers\dashboard\MotelController::class, 'index'])->name('dashboard.motels');
        Route::get('/create', [\App\Http\Controllers\dashboard\MotelController::class, 'create'])->name('dashboard.motels.create');
        Route::post('/create', [\App\Http\Controllers\dashboard\MotelController::class, 'store'])->name('dashboard.motels.store');
        Route::get('/edit/{id}', [\App\Http\Controllers\dashboard\MotelController::class, 'edit'])->name('dashboard.motels.edit');
        Route::put('/update/{id}', [\App\Http\Controllers\dashboard\MotelController::class, 'update'])->name('dashboard.motels.update');
        Route::delete('/delete/{id}', [\App\Http\Controllers\dashboard\MotelController::class, 'destroy'])->name('dashboard.motels.destroy');
    });
    Route::prefix('customers')->middleware('auth')->group(function () {
        Route::get('/', [\App\Http\Controllers\dashboard\CustomerController::class, 'index'])->name('dashboard.customers');
        Route::get('/create', [\App\Http\Controllers\dashboard\CustomerController::class, 'create'])->name('dashboard.customers.create');
        Route::post('/create', [\App\Http\Controllers\dashboard\CustomerController::class, 'store'])->name('dashboard.customers.store');
        Route::get('/edit/{id}', [\App\Http\Controllers\dashboard\CustomerController::class, 'edit'])->name('dashboard.customers.edit');
        Route::put('/update/{id}', [\App\Http\Controllers\dashboard\CustomerController::class, 'update'])->name('dashboard.customers.update');
        Route::delete('/delete/{id}', [\App\Http\Controllers\dashboard\CustomerController::class, 'destroy'])->name('dashboard.customers.destroy');
    });
    Route::prefix('contracts')->middleware('auth')->group(function () {
        Route::get('/', [\App\Http\Controllers\dashboard\ContractController::class, 'index'])->name('dashboard.contracts');
//        Route::get('/create', [\App\Http\Controllers\dashboard\ContractController::class, 'create'])->name('dashboard.contracts.create');
//        Route::post('/create', [\App\Http\Controllers\dashboard\ContractController::class, 'store'])->name('dashboard.contracts.store');
        Route::get('/edit/{id}', [\App\Http\Controllers\dashboard\ContractController::class, 'edit'])->name('dashboard.contracts.edit');
        Route::put('/update/{id}', [\App\Http\Controllers\dashboard\ContractController::class, 'update'])->name('dashboard.contracts.update');
        Route::delete('/delete/{id}', [\App\Http\Controllers\dashboard\ContractController::class, 'destroy'])->name('dashboard.contracts.destroy');
    });
    Route::prefix('transactions')->middleware('auth')->group(function () {
        Route::get('/', [\App\Http\Controllers\dashboard\TransactionController::class, 'index'])->name('dashboard.transactions');
        Route::get('/create', [\App\Http\Controllers\dashboard\TransactionController::class, 'create'])->name('dashboard.transactions.create');
        Route::post('/create', [\App\Http\Controllers\dashboard\TransactionController::class, 'store'])->name('dashboard.transactions.store');
//        Route::get('/edit/{id}', [\App\Http\Controllers\dashboard\TransactionController::class, 'edit'])->name('dashboard.transactions.edit');
//        Route::put('/update/{id}', [\App\Http\Controllers\dashboard\TransactionController::class, 'update'])->name('dashboard.transactions.update');
//        Route::delete('/delete/{id}', [\App\Http\Controllers\dashboard\TransactionController::class, 'destroy'])->name('dashboard.transactions.destroy');
    });
    Route::prefix('residents')->middleware('auth')->group(function () {
        Route::get('/', [\App\Http\Controllers\dashboard\ResidentController::class, 'index'])->name('dashboard.residents');
        Route::get('/create', [\App\Http\Controllers\dashboard\ResidentController::class, 'create'])->name('dashboard.residents.create');
        Route::post('/create', [\App\Http\Controllers\dashboard\ResidentController::class, 'store'])->name('dashboard.residents.store');
        Route::get('/edit/{id}', [\App\Http\Controllers\dashboard\ResidentController::class, 'edit'])->name('dashboard.residents.edit');
        Route::put('/update/{id}', [\App\Http\Controllers\dashboard\ResidentController::class, 'update'])->name('dashboard.residents.update');
        Route::delete('/delete/{id}', [\App\Http\Controllers\dashboard\ResidentController::class, 'destroy'])->name('dashboard.residents.destroy');
    });
    Route::prefix('submits')->middleware('auth')->group(function () {
        Route::get('/approve', [\App\Http\Controllers\dashboard\SubmitController::class, 'approve'])->name('dashboard.submits.approve');
        Route::get('/logs', [\App\Http\Controllers\dashboard\SubmitController::class, 'logs'])->name('dashboard.submits.logs');
        Route::put('/accept/{id}', [\App\Http\Controllers\dashboard\SubmitController::class, 'accept'])->name('dashboard.submits.accept');
        Route::put('/reject/{id}', [\App\Http\Controllers\dashboard\SubmitController::class, 'reject'])->name('dashboard.submits.reject');
    });
});
