<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'dateofbirth',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function isAdmin() {
        return $this->type === 'admin';
    }

    public function medicalDetail()
    {
        return $this->hasOne(MedicalDetail::class);
    }

    public function submittedCaseNotes()
    {
        return $this->hasMany(CaseNote::class, 'user_id');
    }

    public function submittedIncidentReports()
    {
        return $this->hasMany(IncidentReport::class, 'submitted_by_user_id');
    }

    public function incidentReportsForParticipant()
    {
        return $this->hasMany(IncidentReport::class, 'relates_to_participant_id');
    }

    public function tripsAsParticipant()
    {
        return $this->belongsToMany(Trip::class)->wherePivot('user_role', 'participant');
    }

    public function tripsAsSupportWorker()
    {
        return $this->belongsToMany(Trip::class)->wherePivot('user_role', 'support_worker');
    }

    public function relatedUsers()
    {
        return $this->belongsToMany(User::class, 'user_user', 'user_id', 'relation_user_id')
            ->withPivot('user_role');
    }

    public function onBehalfOfParticipant()
    {
        return $this->belongsToMany(User::class, 'user_user', 'relation_user_id', 'user_id')
            ->withPivot('user_role');
    }
}
