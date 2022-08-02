<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['member_id','date'];

    public function memberTable()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}
