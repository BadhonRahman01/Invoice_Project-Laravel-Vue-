<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/get_all_invoices', [App\Http\Controllers\InvoiceController::class, 'get_all_invoices']);
Route::get('/search_invoice', [App\Http\Controllers\InvoiceController::class, 'search_invoice']);
Route::get('/create_invoice', [App\Http\Controllers\InvoiceController::class, 'create_invoice']);
