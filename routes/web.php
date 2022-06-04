<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\whatsappController2;

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
    return view('welcome');
});


// Route::post('/send-message', [
//     'uses' => 'whatsappController2@getUserNumber',
//     'as' => 'sendmessage'
//  ]);


 Route::post('/send-message', [App\Http\Controllers\whatsappController2::class, 'getUserNumber'])->name('sendmessage');