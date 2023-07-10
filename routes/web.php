<?php

use App\Http\Controllers\ScanController;
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

Route::get('/', function () {
    return view('form_scan');
});

Route::get('/scan', [ScanController::class, 'redirectTo']); //To direct if the route is called by GET

Route::post('/scan/{is_view?}', [ScanController::class, 'scan'])->name('scan');