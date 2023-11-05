<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $fillable = ['trip_id', 'user_type', 'invite_guid', 'is_active'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
