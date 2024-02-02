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

    public $isEditing = false;

    public $editButtonText = 'Edit Trip';

    public $newParticipant;
    public $newSupportWorker;

    protected $rules = [
        'trip.budget' => 'nullable',
        'trip.trip_end_date' => 'nullable',
        'trip.trip_start_date' => 'nullable',
        'trip.trip_location' => 'nullable',
        'trip.trip_data.location' => 'nullable',
        'trip.trip_data.accommodationProvider' => 'nullable',
        'trip.trip_data.emotionalSupportRequired' => 'nullable',
        'trip.trip_data.emotionalSupport' => 'nullable',
        'trip.trip_data.numberOfBedrooms' => 'nullable',
        'trip.trip_data.accommodationAccessible' => 'nullable',
        'trip.trip_data.accommodationAccessibleDetails' => 'nullable',
        'trip.trip_data.accommodationRequests' => 'nullable',
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

    public function addParticipant() {
        $this->authorize('addParticipant', $this->trip);
        $this->validate([
            'newParticipant' => 'required'
        ]);

        $this->trip->participants()->attach($this->newParticipant, ['user_role' => 'participant']);

        $this->trip->refresh();

        $this->newParticipant = null;
    }

    public function getAllUsersAvailableToLinkProperty() {
        $allUsers = \App\Models\User::all();

        // Filter all users to exclude users already linked to the trip as a support worker or participant
        $allUsers = $allUsers->filter(function($user) {
            return !$this->trip->allParticipants()->contains($user) && !$this->trip->supportWorkers->contains($user);
        });

        return $allUsers;
    }

    public function removeParticipant($participantId) {
        $this->authorize('addParticipant', $this->trip);
        $this->trip->participants()->detach($participantId);
        $this->trip->refresh();
    }

    public function removeSupportWorker($supportWorkerId) {
        $this->authorize('addParticipant', $this->trip);
        $this->trip->supportWorkers()->detach($supportWorkerId);
        $this->trip->refresh();
    }

    public function addSupportWorker() {
        $this->authorize('addParticipant', $this->trip);
        $this->validate([
            'newSupportWorker' => 'required'
        ]);

        $this->trip->supportWorkers()->attach($this->newSupportWorker, ['user_role' => 'support_worker']);

        $this->trip->refresh();

        $this->newSupportWorker = null;
    }

    public function toggleEditing() {
        $this->isEditing = !$this->isEditing;
        $this->editButtonText = $this->isEditing ? 'Save Changes' : 'Edit Trip';
        $this->trip->save();
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
