<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'id',
        'nip',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
