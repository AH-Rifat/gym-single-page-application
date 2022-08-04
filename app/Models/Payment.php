<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['member_id','amount','payment_date','note'];

    public function memberTable()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}
