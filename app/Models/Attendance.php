<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'id',
        'attendance_date',
        'check_in_time',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
