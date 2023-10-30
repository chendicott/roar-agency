<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalDetail extends Model
{
    protected $fillable = ['user_id', 'medical_data'];

    protected $casts = [
        'medical_data' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
