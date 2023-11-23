<?php

namespace App\Models;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;


class MedicalDetail extends Model
{
    protected $fillable = ['user_id', 'medical_data'];

    protected $casts = [
        'medical_data' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (isset($model->attributes['medical_data'])) {
                $model->attributes['medical_data'] = Crypt::encrypt($model->attributes['medical_data']);
            }
        });
    }

    public function getMedicalDataAttribute($value)
    {
        try {
            return json_decode(Crypt::decrypt($value));
        } catch (DecryptException $e) {
            Log::error('Decryption error for model ' . self::class . ' ID ' . $this->id . ': ' . $e->getMessage());
            return null; // or any default value
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
