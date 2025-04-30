<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $fillable = [
        'major_id',
        'id',
        'nama_kelas',
    ];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
