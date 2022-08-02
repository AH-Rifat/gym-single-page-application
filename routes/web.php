<?php

use App\Http\Livewire\Attendance;
use App\Http\Livewire\Expence;
use App\Http\Livewire\FindAttendance;
use App\Http\Livewire\Home;
use App\Http\Livewire\Member;
use App\Http\Livewire\Payment;
use App\Http\Livewire\PaymentList;
use App\Http\Livewire\Reports;
use Illuminate\Support\Facades\Route;


Route::get('/', Home::class);
Route::get('/registration', Member::class);
Route::get('/payment', Payment::class);
Route::get('/payment_list', PaymentList::class);
Route::get('/attendance', Attendance::class);
Route::get('/find_attendance', FindAttendance::class);
Route::get('/expance', Expence::class);
Route::get('/reports', Reports::class);
