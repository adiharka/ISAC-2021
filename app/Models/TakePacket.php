<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TakePacket extends Model
{
    use HasFactory;
    const CREATED_AT = 'start';

    protected $fillable = ['packet_id','question_order','mark'];

    public function packet()
    {
        return $this->belongsTo(Packet::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answer()
    {
        return $this->hasMany(Answer::class);
    }
}
