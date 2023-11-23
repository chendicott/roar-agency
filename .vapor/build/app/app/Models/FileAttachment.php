<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileAttachment extends Model
{
    protected $fillable = ['linked_model_type', 'linked_model_id', 's3_file_link'];

    public function linkedModel()
    {
        return $this->morphTo();
    }
}
