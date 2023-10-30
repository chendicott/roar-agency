<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseNote extends Model
{
    protected $fillable = ['trip_id', 'user_id', 'note_content'];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
