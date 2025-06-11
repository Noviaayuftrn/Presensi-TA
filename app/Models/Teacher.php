<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'class_id',
        'major_id',
        'id',
        'nip',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function schedules() 
    {
    return $this->hasMany(Schedule::class);
    }

     public function class()
    {
        return $this->belongsTo(Classes::class); // model kamu: Classes
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
