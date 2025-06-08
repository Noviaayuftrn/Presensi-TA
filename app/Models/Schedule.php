<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'major_id',
        'class_id',
        'sub_id',
        'teach_id',
        'id',
        'date',
        'jam_mulai',
        'jam_selesai',
        'status',
    ];

    public function majors()
    {
        return $this->belongsTo(Majors::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
    
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    
}
