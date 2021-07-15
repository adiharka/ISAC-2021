<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'borndate',
        'photolink',
        'leader'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
