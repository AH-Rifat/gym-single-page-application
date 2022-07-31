<?php

use App\Http\Livewire\Attendance;
use App\Http\Livewire\Home;
use App\Http\Livewire\Member;
use App\Http\Livewire\MemberPackage;
use App\Http\Livewire\Payment;
use App\Http\Livewire\PaymentList;
use Illuminate\Support\Facades\Route;


Route::get('/', Home::class);
Route::get('/registration', Member::class);
Route::get('/payment', Payment::class);
Route::get('/payment_list', PaymentList::class);
Route::get('/attendance', Attendance::class);
Route::get('/package', MemberPackage::class);
