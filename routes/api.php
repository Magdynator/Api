<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apicontroller;

Route::get('/test', [apicontroller::class, 'index']);
Route::get('/getdata', [apicontroller::class, 'getdata']);
Route::get('/closerHis/{longitude}/{latitude}', [apicontroller::class, 'closerHis']);
Route::get('/closer10His/{longitude}/{latitude}', [apicontroller::class, 'closer10His']);