<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'target_id',
        'event',
        'type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
