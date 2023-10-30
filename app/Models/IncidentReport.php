<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncidentReport extends Model
{
    protected $fillable = ['trip_id', 'submitted_by_user_id', 'relates_to_participant_id', 'incident_data'];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function submittedBy()
    {
        return $this->belongsTo(User::class, 'submitted_by_user_id');
    }

    public function participant()
    {
        return $this->belongsTo(User::class, 'relates_to_participant_id');
    }

    public function fileAttachments()
    {
        return $this->morphMany(FileAttachment::class, 'linked_model');
    }
}
