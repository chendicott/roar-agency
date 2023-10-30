<?php

namespace App\Http\Livewire;

use App\Models\Trip;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class TripController extends Component
{
    use AuthorizesRequests;

    public Trip $trip;
    public function mount(Trip $trip) {
        $this->authorize('view', $trip);
        $trip->load('participants.medicalDetail', 'participants.relatedUsers', 'participants.onBehalfOfParticipant', 'participants.onBehalfOfParticipant.medicalDetails', 'supportWorkers.medicalDetails', 'caseNotes', 'incidentReports', 'fileAttachments');
        $this->trip = $trip;
    }
    public function render()
    {
        return view('livewire.trip-controller');
    }
}
