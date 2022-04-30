<?php

use App\Http\Controllers\InvoicesController;
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
    return view('index');
});

Route::get('/invoices', [InvoicesController::class, 'index'])->name('invoices.list');

Route::get('/invoices/add', [InvoicesController::class, 'create'])->name('invoices.add');

Route::get('/welcome', function () {
    return view('welcome');
});
