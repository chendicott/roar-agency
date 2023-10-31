<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class TripForm extends Component
{
    public $isGuest = false;

    public $currentStep = 'quote';
    public $currentUser = null;
    public $currentUserRoleForTrip = null;

    // Quote properties
    public $numberOfNights;
    public $supportWorkerPreference;
    public $receiveSupportFromRoar;
    public $quoteAmount;

    // Participant properties
    public $participantFirstName;
    public $participantLastName;
    public $participantTitle;
    public $participantPronouns;
    public $participantEmailAddress;
    public $participantContact;
    public $participantCity;
    public $participantState;
    public $participantPostCode;
    public $participantCompanionCard;
    public $participantSmoker;
    public $participantMedicalDetailsDiagnosis;
    public $participantMedicalDetailsMedicalConditions;
    public $participantMedicalDetailsPhysicalSupportNeeds;
    public $participantMedicalDetailsMedication;
    public $participantMedicalDetailsMedicalAdministration;
    public $participantMedicalDetailsAllergies;
    public $participantMedicalDetailsBehaviourSupportPlanOrForensicOrder;
    public $participantPlanNomineeFirstName;
    public $participantPlanNomineeLastName;
    public $participantPlanNomineeEmail;
    public $participantPlanNomineeContact;
    public $participantSupportCoordinatorFirstName;
    public $participantSupportCoordinatorLastName;
    public $participantSupportCoordinatorEmail;
    public $participantSupportCoordinatorContact;
    public $participantAppointedGuardianFirstName;
    public $participantAppointedGuardianLastName;
    public $participantAppointedGuardianEmail;
    public $participantAppointedGuardianContact;
    public $participantEmergencyContactFirstName;
    public $participantEmergencyContactLastName;
    public $participantEmergencyContactContactNumber;
    public $participantEmergencyContactEmail;
    public $participantEmergencyContactRelationship;

    // Trip properties
    public $tripLocation;
    public $tripAccommodationProvider;
    public $tripStartDate;
    public $tripEndDate;
    public $tripSupportWorkerFirstName;
    public $tripSupportWorkerLastName;
    public $tripSupportWorkerEmail;
    public $tripSupportWorkerContact;
    public $tripEmotionalSupportName;
    public $tripEmotionalSupportRelationship;
    public $tripEmotionalSupportDateOfBirth;
    public $tripNumberOfBedrooms;
    public $tripAccommodationAccessible;
    public $tripAccommodationAccessibleDetails;
    public $tripAccommodationRequests;


    public function mount() {
        $this->isGuest = str_contains(Route::getCurrentRoute()->uri(), 'guest');

        if (!$this->isGuest) {
            $this->currentUser = auth()->user()->with(['medicalDetails', 'relatedUsers', 'relatedUsers.medicalDetails', 'onBehalfOfParticipant', 'onBehalfOfParticipant.medicalDetails'])->find(auth()->user()->id);
        }
    }

    public function changeStep($step) {
        $this->currentStep = $step;
    }

    public function nextStep() {
        $steps = [
            'quote',
            'your-details',
            'trip-details',
            'medical-details',
            'summary'
        ];

        $currentStepIndex = array_search($this->currentStep, $steps);
        $this->currentStep = $steps[$currentStepIndex + 1];
    }

    public function previousStep() {
        $steps = [
            'quote',
            'your-details',
            'trip-details',
            'medical-details',
            'summary'
        ];

        $currentStepIndex = array_search($this->currentStep, $steps);

        if ($currentStepIndex > 0) {
            $this->currentStep = $steps[$currentStepIndex - 1];
        }
    }

    public function cancel() {
        redirect()->route('dashboard');
    }


    public function render()
    {
        if ($this->isGuest) {
            return view('livewire.trip-form')->layout('layouts.guest');
        }

        return view('livewire.trip-form')->layout('layouts.app');
    }
}
