<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = ['trip_name', 'trip_start_date', 'trip_end_date', 'trip_location', 'trip_data', 'budget'];

    public function caseNotes()
    {
        return $this->hasMany(CaseNote::class);
    }

    public function incidentReports()
    {
        return $this->hasMany(IncidentReport::class);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class)->wherePivot('user_role', 'participant');
    }

    public function supportWorkers()
    {
        return $this->belongsToMany(User::class)->wherePivot('user_role', 'support_worker');
    }

    public function fileAttachments()
    {
        return $this->morphMany(FileAttachment::class, 'linked_model');
    }
}
