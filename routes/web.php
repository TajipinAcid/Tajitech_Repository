<?php

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

Route::get('/', function () {return view('posts/upload');});
Route::view('upload', 'upload');
Route::post('s3', [\App\Http\Controllers\S3Controller::class, 'uploadS3'])->name('s3');