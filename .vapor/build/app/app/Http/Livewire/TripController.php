<?php

namespace App\Http\Livewire;

use App\Models\Trip;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class TripController extends Component
{
    use AuthorizesRequests;

    public Trip $trip;
    public $incident;
    public $incident_participant;
    public $incident_date;

    public $status;
    protected $rules = [
        'trip.budget' => 'nullable'
    ];

    public function mount(Trip $trip) {
        $this->authorize('view', $trip);
        $trip->load('participants.medicalDetails', 'participants.relatedUsers', 'participants.onBehalfOfParticipant', 'participants.onBehalfOfParticipant.medicalDetails', 'supportWorkers.medicalDetails', 'caseNotes', 'incidentReports', 'fileAttachments');
        $this->trip = $trip;
        $this->status = $trip->status;
    }

    public function updateBudget() {
        $this->authorize('updateBudget', $this->trip);
        $this->trip->update([
            'budget' => $this->trip->budget
        ]);
    }

    public function updatedStatus() {
        $this->authorize('update', $this->trip);
        $this->trip->status = $this->status;
        $this->trip->save();

    }

    public function submitIncident() {
        $this->validate([
            'incident' => 'required',
            'incident_participant' => 'required',
            'incident_date' => 'required'
        ]);

        $this->trip->incidentReports()->create([
            'relates_to_participant_id' => $this->incident_participant,
            'submitted_by_user_id' => auth()->id(),
            'incident_data' => [
                'date' => $this->incident_date,
                'incident' => $this->incident
            ]
        ]);

        $this->trip->refresh();

        $this->incident = '';
        $this->incident_participant = '';
        $this->incident_date = '';
    }

    public function camelCaseToFriendlyName($input) {
        // First, split the string into individual words based on uppercase letters
        $words = preg_split('/(?=[A-Z])/', $input, -1, PREG_SPLIT_NO_EMPTY);

        // Then, join the words with a space and capitalize the first letter of each word
        $friendlyName = implode(' ', $words);
        $friendlyName = ucwords($friendlyName);

        return $friendlyName;
    }

    public function render()
    {
        return view('livewire.trip-controller');
    }
}
