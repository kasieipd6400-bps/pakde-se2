<?php

use App\Livewire\PublicEkodigi;
use Illuminate\Support\Facades\Route;

Route::get('/usaha-digital', PublicEkodigi::class)
    ->name('public-ekodigi');

//Route::get('/public-ekodigi/succes', function () {
Route::get('/usaha-digital/sukses', function () {
    return view('public-ekodigi-succes');
})->name('public-ekodigi.succes');

/*
Route::get('/', function () {
   return view('welcome');
   
});
*/
