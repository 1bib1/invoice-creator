<?php

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\InvoicesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;

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
Route::get('/invoices', [InvoicesController::class, 'index'])->name('invoices.index');
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


Route::resource('/invoices', InvoicesController::class)->middleware('auth');
Route::resource('/customers', CustomersController::class)->middleware('auth');

Route::get('/welcome', function () {
    return view('welcome');
});
