<?php

namespace App\Policies;

use App\Models\Trip;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TripPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function updateBudget(User $user, Trip $trip) {
        if ($user->isAdmin()) {
            return true;
        }

        return false;
    }

    public function addParticipant(User $user, Trip $trip) {
        if ($user->isAdmin()) {
            return true;
        }

        return false;
    }

    public function update(User $user, Trip $trip) {
        if ($user->isAdmin()) {
            return true;
        }

        return false;
    }

    public function view(User $user, Trip $trip) {
        if ($user->isAdmin()) {
            return true;
        }

        $tripParticipants = $trip->allParticipants();
        if ($tripParticipants->contains($user)) {
            return true;
        }

        return false;
    }
}
