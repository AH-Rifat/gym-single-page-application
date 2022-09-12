<?php

use App\Http\Livewire\Attendance;
use App\Http\Livewire\Expence;
use App\Http\Livewire\FindAttendance;
use App\Http\Livewire\Home;
use App\Http\Livewire\Member;
use App\Http\Livewire\Payment;
use App\Http\Livewire\PaymentList;
use App\Http\Livewire\Revenue;
use App\Http\Livewire\SendSms;
use App\Http\Livewire\SmsSettings;
use App\Http\Livewire\UserProfile;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/home', Home::class);
    Route::get('/registration', Member::class);
    Route::get('/payment', Payment::class);
    Route::get('/payment_list', PaymentList::class);
    Route::get('/attendance', Attendance::class);
    Route::get('/find_attendance', FindAttendance::class);
    Route::get('/expance', Expence::class);
    Route::get('/user-profile', UserProfile::class);
    Route::get('/send_sms', SendSms::class);
    Route::get('/sms_settings', SmsSettings::class);
    Route::get('/revenue', Revenue::class);
});

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');
