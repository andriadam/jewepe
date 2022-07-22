<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
