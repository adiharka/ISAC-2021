<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packet extends Model
{
    use HasFactory;

    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function takepacket()
    {
        return $this->hasMany(TakePacket::class);
    }
}
