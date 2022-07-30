<?php

use App\Http\Livewire\Member;
use App\Http\Livewire\Payment;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/registration', Member::class);
Route::get('/payment', Payment::class);
