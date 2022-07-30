<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','email','dob','age','height','weight','work','bloodGroup','gender','address','mobile',
        'nationalId','photo','package','total','paid','due'
    ];
}
