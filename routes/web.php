<?php

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
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

/*
# return invoice create view
Route::get('/invoices/create', [InvoicesController::class, 'create'])->name('invoices.create');
#post form for invoice creation 
Route::post('/invoices/store', [InvoicesController::class, 'store'])->name('invoices.store');
## return edit view
Route::get('/invoices/edit/{invoice}', [InvoicesController::class, 'edit'])->name('invoices.edit');
#post edit of invoice
Route::put('/invoices/update/{invoice}', [InvoicesController::class, 'update'])->name('invoices.update');
#delete invoice
Route::delete('/invoices/destroy/{invoice}', [InvoicesController::class, 'destroy'])->name('invoices.destroy');
*/

Route::get('/', function () {
    return view('index');
});

Route::group(['middleware' =>['guest']], function(){
    #login routes
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
    #register routes
    Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');
});

Route::group(['middleware' => ['auth']], function() {
    /**
     * Logout Routes
     */
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
    #invoice routes
    Route::resource('/invoices', InvoicesController::class);
    #customer routes
    Route::resource('/customers', CustomersController::class);
});


Route::get('/welcome', function () {
    return view('welcome');
});
