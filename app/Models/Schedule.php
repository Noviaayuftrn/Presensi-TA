<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_id',
        'sub_id',
        'teach_id',
        'room_id',
        'id',
        'hari',
        'jam_mulai',
        'jam_selesai',
    ];

    public function classes()
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

    public function Room()
    {
        return $this->belongsTo(Room::class);
    }
}
