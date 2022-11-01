<?php

use App\Http\Controllers\UserController;
use App\Models\DomainsDb;
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
    $links = DomainsDb::all();
    return view('dashboard', ['links' => $links]);
})->name('dashboard');

Route::get('/users/{amount}', [UserController::class, 'show'])
    ->middleware(['auth'])->where('amount', '[0-9]+')->name('users');

Route::get('/users/update/{recipient_id}', [UserController::class, 'update'])
    ->middleware(['auth'])->where('recipient_id', '[0-9]+')->name('users.update');


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard', ['name' => 'Motherlink']);
//     })->name('dashboard');
// });
