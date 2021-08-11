<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function packet()
    {
        return $this->belongsTo(Packet::class);
    }

    public function answer()
    {
        return $this->hasMany(Answer::class);
    }
}
