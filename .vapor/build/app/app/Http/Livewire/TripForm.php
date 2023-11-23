<?php

namespace App\Http\Livewire;

use App\Models\Trip;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Livewire\Component;

class TripForm extends Component
{
    public $isGuest = false;

    public $currentStep = 'quote';
    public $currentUser;
    public $currentUserRoleForTrip = null;

    // Quote properties
    public $numberOfNights;
    public $supportWorkerPreference;
    public $receiveSupportFromRoar;
    public $quoteAmount;

    public $participant = [];

    public $numberOfParticipants = 1;
    public $maxNumberOfParticipants = 4;

    public $hideMedicalDetailsFor = [
        1 => false,
        2 => false,
        3 => false,
        4 => false
    ];

    public $disableEmailChangeForParticipant = [
        1 => false,
        2 => false,
        3 => false,
        4 => false
    ];

    public $userFirstName;
    public $userLastName;
    public $userEmail;
    public $userContact;


    // Trip properties
    public $tripLocation;
    public $tripAccommodationProvider;
    public $tripDatesKnown;
    public $tripStartDate;
    public $tripEndDate;
    public $tripSupportWorkerFirstName;
    public $tripSupportWorkerLastName;
    public $tripSupportWorkerEmail;
    public $tripSupportWorkerContact;
    public $tripEmotionalSupportRequired;
    public $tripEmotionalSupportName;
    public $tripEmotionalSupportRelationship;
    public $tripEmotionalSupportDateOfBirth;
    public $tripNumberOfBedrooms;
    public $tripAccommodationAccessible;
    public $tripAccommodationAccessibleDetails;
    public $tripAccommodationRequests;

    public $showThanks = false;

    public $pageIsComplete = [
        'quote' => false,
        'your-details' => false,
        'participant-details' => false,
        'trip-details' => false,
        'medical-details' => false,
        'summary' => false
    ];

    public $pageHasError = [
        'quote' => false,
        'your-details' => false,
        'participant-details' => false,
        'trip-details' => false,
        'medical-details' => false,
        'summary' => false
    ];


    public function mount() {
        $this->isGuest = str_contains(Route::getCurrentRoute()->uri(), 'guest');

        if (!$this->isGuest) {
            $this->currentUser = auth()->user()->with(['medicalDetails', 'relatedUsers', 'relatedUsers.medicalDetails', 'onBehalfOfParticipant', 'onBehalfOfParticipant.medicalDetails'])->find(auth()->user()->id);
        }
    }

    public function updating() {

        // When current user role is participant, copy data from current user to participant 1
        // If logged in, then we don't need to display the current User details information

        $this->processFieldDefaults();
    }

    private function setDefaultValueForParticipant($participantIndex, $key, $value) {
        if (!isset($this->participant[$participantIndex][$key]) || $this->participant[$participantIndex][$key] === '') {
            $this->participant[$participantIndex][$key] = $value;
        }
    }

    public function addMedicalItem($participantIdentifier, $item) {
        if (!isset($this->participant[$participantIdentifier]['medicalDetails']['newItems'][$item]) || $this->participant[$participantIdentifier]['medicalDetails']['newItems'][$item] === '') return;

        if (!isset($this->participant[$participantIdentifier]['medicalDetails'][$item])) {
            $this->participant[$participantIdentifier]['medicalDetails'][$item] = [];
        }

        $this->participant[$participantIdentifier]['medicalDetails'][$item][] = $this->participant[$participantIdentifier]['medicalDetails']['newItems'][$item];
        $this->participant[$participantIdentifier]['medicalDetails']['newItems'][$item] = '';
    }

    public function removeMedicalItem($participantIdentifier, $item, $index) {
        if (isset($this->participant[$participantIdentifier]['medicalDetails'][$item][$index])) {
            unset($this->participant[$participantIdentifier]['medicalDetails'][$item][$index]);
        }
    }

    public function getQuoteBreakdownProperty() {
        if ($this->supportWorkerPreference == "Bring your own support worker") {
            return '$xx will be spent on food, accommodation, and activities. $xx Roar agency fee. Total amount to be charged to plan for n nights/n days is $xx';
        } else {
            return '$ will be spent on food, accommodation, and activities. The remainder of the invoice is Support Worker and Roar Agency fee.';
        }
    }

    public function nextStep() {
        $steps = [
            'quote',
            'your-details',
            'participant-details',
            'trip-details',
            'medical-details',
            'summary'
        ];

        try {
            $this->validatePage();
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->pageHasError[$this->currentStep] = true;

            throw $e;
        }

        $this->pageIsComplete[$this->currentStep] = true;
        $this->pageHasError[$this->currentStep] = false;

        $currentStepIndex = array_search($this->currentStep, $steps);
        $this->currentStep = $steps[$currentStepIndex + 1];

        $this->processFieldDefaults();
    }

    private function validatePage() {
        $steps = [
            'quote' => $this->quoteRules(),
            'your-details' => $this->yourDetailsRules(),
            'participant-details' => $this->participantDetailRules(),
            'trip-details' => $this->tripDetailsRules(),
            'medical-details' => $this->medicalDetailsRules(),
            'summary' => []
        ];

        if ($steps[$this->currentStep] === []) return;

        $this->validate($steps[$this->currentStep]);
    }

    private function participantDetailRules() {
        $rules = [];

        for ($i = 1; $i <= $this->numberOfParticipants; $i++) {

            if (!isset($this->participant[$i])) {
                $this->participant[$i] = [];
            }

            $rules["participant.{$i}.firstName"] = 'required';
            $rules["participant.{$i}.lastName"] = 'required';
            $rules["participant.{$i}.title"] = 'required';
            $rules["participant.{$i}.pronouns"] = 'required';
            $rules["participant.{$i}.email"] = 'required|email';
            $rules["participant.{$i}.contact"] = 'required';
            $rules["participant.{$i}.dateOfBirth"] = 'required';
            $rules["participant.{$i}.city"] = 'required';
            $rules["participant.{$i}.state"] = 'required';
            $rules["participant.{$i}.postCode"] = 'required';
            $rules["participant.{$i}.companionCard"] = 'required';
            $rules["participant.{$i}.smoker"] = 'required';
            $rules["participant.{$i}.planNomineeApplicable"] = 'required';
            $rules["participant.{$i}.supportCoordinatorApplicable"] = 'required';
            $rules["participant.{$i}.appointedGuardianApplicable"] = 'required';
            $rules["participant.{$i}.planManaged"] = 'required';
            $rules["participant.{$i}.selfManaged"] = 'required';

            if (isset($this->participant[$i]['planNomineeApplicable']) && $this->participant[$i]['planNomineeApplicable'] === 'Yes') {
                $rules["participant.{$i}.planNomineeFirstName"] = 'required';
                $rules["participant.{$i}.planNomineeLastName"] = 'required';
                $rules["participant.{$i}.planNomineeEmail"] = 'required|email';
                $rules["participant.{$i}.planNomineeContact"] = 'required';
            }

            if (isset($this->participant[$i]['supportCoordinatorApplicable']) && $this->participant[$i]['supportCoordinatorApplicable'] === 'Yes') {
                $rules["participant.{$i}.supportCoordinatorFirstName"] = 'required';
                $rules["participant.{$i}.supportCoordinatorLastName"] = 'required';
                $rules["participant.{$i}.supportCoordinatorEmail"] = 'required|email';
                $rules["participant.{$i}.supportCoordinatorContact"] = 'required';
            }

            if (isset($this->participant[$i]['appointedGuardianApplicable']) && $this->participant[$i]['appointedGuardianApplicable'] === 'Yes') {
                $rules["participant.{$i}.appointedGuardianFirstName"] = 'required';
                $rules["participant.{$i}.appointedGuardianLastName"] = 'required';
                $rules["participant.{$i}.appointedGuardianEmail"] = 'required|email';
                $rules["participant.{$i}.appointedGuardianContact"] = 'required';
            }

            if (isset($this->participant[$i]['planManaged']) && $this->participant[$i]['planManaged'] === 'Yes') {
                $rules["participant.{$i}.planManagerEmail"] = 'nullable|email';
                $rules["participant.{$i}.planManagerFullName"] = 'required';
            }

            if (isset($this->participant[$i]['selfManaged']) && $this->participant[$i]['selfManaged'] == 'Yes') {
                $rules["participant.{$i}.selfManagedEmail"] = 'required|email';
            }
        }

        return $rules;
    }

    private function quoteRules() {
        $rules = [
            'numberOfNights' => 'required|numeric|min:1',
            'supportWorkerPreference' => 'required'
        ];

        if ($this->supportWorkerPreference == "Supported by Roar Agency") {
            $rules['receiveSupportFromRoar'] = 'required';
        }

        return $rules;
    }

    private function yourDetailsRules() {
        $rules = [
            'numberOfParticipants' => 'required|numeric|min:1|max:4',
            'currentUserRoleForTrip' => 'required'
        ];

        if ($this->isGuest) {
            $rules['userFirstName'] = 'required';
            $rules['userLastName'] = 'required';
            $rules['userEmail'] = 'required|email';
            $rules['userContact'] = 'required';
        }

        return $rules;
    }

    private function tripDetailsRules() {
        $rules = [
            'tripLocation' => 'required',
            'tripAccommodationProvider' => 'nullable',
            'tripDatesKnown' => 'required',
            'tripStartDate' => 'nullable|date',
            'tripEndDate' => 'nullable|date',
            'tripSupportWorkerFirstName' => 'nullable',
            'tripSupportWorkerLastName' => 'nullable',
            'tripSupportWorkerEmail' => 'nullable|email',
            'tripSupportWorkerContact' => 'nullable',
            'tripNumberOfBedrooms' => 'required|numeric',
            'tripEmotionalSupportRequired' => 'required',
            'tripAccommodationAccessible' => 'required'
        ];

        if ($this->tripEmotionalSupportRequired === 'Yes') {
            $rules['tripEmotionalSupportRequired'] = 'required';
            $rules['tripEmotionalSupportName'] = 'required';
            $rules['tripEmotionalSupportRelationship'] = 'required';
            $rules['tripEmotionalSupportDateOfBirth'] = 'required';
        }

        if ($this->tripAccommodationAccessible === 'Yes') {
            $rules['tripAccommodationAccessibleDetails'] = 'required';
        }

        return $rules;
    }

    private function medicalDetailsRules() {
       $rules = [];

        for ($i = 1; $i <= $this->numberOfParticipants; $i++) {

            if (!isset($this->participant[$i])) {
                $this->participant[$i] = [];
            }

            if ($this->hideMedicalDetailsFor[$i] === true) continue;

            $rules["participant.{$i}.medicalDetails.medicationAdministration"] = 'required';
            $rules["participant.{$i}.medicalDetails.behaviourSupportPlan"] = 'required';
            $rules["participant.{$i}.medicalDetails.emergencyContact.name"] = 'required';
            $rules["participant.{$i}.medicalDetails.emergencyContact.phone"] = 'required';
            $rules["participant.{$i}.medicalDetails.emergencyContact.relationship"] = 'required';
        }

        return $rules;
    }

    public function previousStep() {
        $steps = [
            'quote',
            'your-details',
            'participant-details',
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

    public function submit() {
        $this->validatePage();

        $this->pageIsComplete[$this->currentStep] = true;
        $this->pageHasError[$this->currentStep] = false;

        DB::beginTransaction();

        try {


            $trip = $this->buildTrip();
            $uniqueEmails = [];
            $participantsWithUniqueEmails = [];

            $createdParticipants = [];

            foreach ($this->participant as $participant) {
                if (!isset($uniqueEmails[$participant['email']])) {
                    $uniqueEmails[$participant['email']] = true;
                    $participantsWithUniqueEmails[] = $participant;
                }
            }

            foreach ($participantsWithUniqueEmails as $participant) {
                $participantAsUser = $this->searchForUserByEmailOrCreate($participant['email'], $participant['firstName'], $participant['lastName'], $participant['contact'], $participant);
                $participantAsUser->medicalDetails()->create(['medical_data' => $participant['medicalDetails']]);

                $entitiesToSearch = [];

                if (isset($participant['planNomineeEmail'])) {
                    $entitiesToSearch['plan_nominee']['email'] = $participant['planNomineeEmail'];
                    $entitiesToSearch['plan_nominee']['firstName'] = $participant['planNomineeFirstName'];
                    $entitiesToSearch['plan_nominee']['lastName'] = $participant['planNomineeLastName'];
                    $entitiesToSearch['plan_nominee']['contact'] = $participant['planNomineeContact'];
                }

                if (isset($participant['planManagerEmail'])) {
                    $entitiesToSearch['plan_manager']['email'] = $participant['planManagerEmail'];
                    $entitiesToSearch['plan_manager']['name'] = $participant['planManagerFullName'];
                    $entitiesToSearch['plan_manager']['firstName'] = $participant['planManagerFullName'];
                    $entitiesToSearch['plan_manager']['lastName'] = " ";
                    $entitiesToSearch['plan_manager']['contact'] = '';
                }

                if (isset($participant['supportCoordinatorEmail'])) {
                    $entitiesToSearch['support_coordinator']['email'] = $participant['supportCoordinatorEmail'];
                    $entitiesToSearch['support_coordinator']['firstName'] = $participant['supportCoordinatorFirstName'];
                    $entitiesToSearch['support_coordinator']['lastName'] = $participant['supportCoordinatorLastName'];
                    $entitiesToSearch['support_coordinator']['contact'] = $participant['supportCoordinatorContact'];
                }

                if (isset($participant['appointedGuardianEmail'])) {
                    $entitiesToSearch['appointed_guardian']['email'] = $participant['appointedGuardianEmail'];
                    $entitiesToSearch['appointed_guardian']['firstName'] = $participant['appointedGuardianFirstName'];
                    $entitiesToSearch['appointed_guardian']['lastName'] = $participant['appointedGuardianLastName'];
                    $entitiesToSearch['appointed_guardian']['contact'] = $participant['appointedGuardianContact'];
                }


                foreach ($entitiesToSearch as $entityType => $entity) {
                    if ($entity['email'] !== '') {
                        $user = $this->searchForUserByEmailOrCreate($entity['email'], $entity['firsName'], $entity['lastName'], $entity['contact']);

                        $user->onBehalfOfParticipant()->save($participantAsUser, ['user_role' => $entityType]);
                    }
                }

                $createdParticipants[] = $participantAsUser;
            }

            foreach ($createdParticipants as $participant) {
                $participant->tripsAsParticipant()->save($trip, ['user_role' => 'participant']);
            }


            DB::commit();
        } catch (\Exception $e)  {
            DB::rollBack();
            throw $e;
        }

        if (!$this->isGuest) {
            redirect()->to('/trip/' . $trip->id);
        } else {
            $this->showThanks = true;
        }
    }

    private function searchForUserByEmailOrCreate($email, $firstName, $lastName, $contact, $details = [], $isActive = false): User {
        $user = User::where('email', $email)->first();

        if (!$user) {
            $user = new User();
            $user->email = $email;
            $user->first_name = $firstName;
            $user->last_name = $lastName;
            $user->contact = $contact;
            $user->is_active = $isActive;
            $user->password = Hash::make(Str::random(24));
            $user->type = 'user';
            $user->details = $details;
            $user->save();

            if (!$isActive) {
                $invite = $user->invite()->create([
                    'invite_guid' => Str::uuid(),
                    'is_active' => true
                ]);
            }
        }

        return $user;
    }

    private function buildTrip(): Trip {
        $tripJson = [];

        $tripJson['location'] = $this->tripLocation;
        $tripJson['accommodationProvider'] = $this->tripAccommodationProvider;
        $tripJson['startDate'] = $this->tripStartDate;
        $tripJson['endDate'] = $this->tripEndDate;
        $tripJson['supportWorker'] = [];
        $tripJson['supportWorker']['firstName'] = $this->tripSupportWorkerFirstName;
        $tripJson['supportWorker']['lastName'] = $this->tripSupportWorkerLastName;
        $tripJson['supportWorker']['email'] = $this->tripSupportWorkerEmail;
        $tripJson['supportWorker']['contact'] = $this->tripSupportWorkerContact;
        $tripJson['emotionalSupportRequired'] = $this->tripEmotionalSupportRequired;
        $tripJson['emotionalSupport'] = [];
        $tripJson['emotionalSupport']['name'] = $this->tripEmotionalSupportName;
        $tripJson['emotionalSupport']['relationship'] = $this->tripEmotionalSupportRelationship;
        $tripJson['emotionalSupport']['dateOfBirth'] = $this->tripEmotionalSupportDateOfBirth;
        $tripJson['numberOfBedrooms'] = $this->tripNumberOfBedrooms;
        $tripJson['accommodationAccessible'] = $this->tripAccommodationAccessible;
        $tripJson['accommodationAccessibleDetails'] = $this->tripAccommodationAccessibleDetails;
        $tripJson['accommodationRequests'] = $this->tripAccommodationRequests;
        $tripJson['quote'] = [];
        $tripJson['quote']['numberOfNights'] = $this->numberOfNights;
        $tripJson['quote']['supportWorkerPreference'] = $this->supportWorkerPreference;
        $tripJson['quote']['receiveSupportFromRoar'] = $this->receiveSupportFromRoar;
        $tripJson['quote']['amount'] = $this->quoteAmount;

        $trip = new Trip();
        $trip->trip_data = $tripJson;
        $trip->trip_name = "Trip to " . $tripJson['location'];
        $trip->trip_start_date = $tripJson['startDate'];
        $trip->trip_end_date = $tripJson['endDate'];
        $trip->trip_location = $tripJson['location'];
        $trip->budget = '';

        $trip->save();

        return $trip;
    }


    public function render()
    {
        if ($this->isGuest) {
            return view('livewire.trip-form')->layout('layouts.guest');
        }

        return view('livewire.trip-form')->layout('layouts.app');
    }

    /**
     * @return void
     */
    public function processFieldDefaults(): void
    {
        if (!$this->isGuest) {
            $this->userEmail = $this->currentUser->email;
            $this->userFirstName = $this->currentUser->first_name;
            $this->userLastName = $this->currentUser->last_name;
            $this->userContact = $this->currentUser->contact;
        }

        $currentUserIsParticipant = false;

        if ($this->currentUserRoleForTrip === 'participant') {
            $this->setDefaultValueForParticipant(1, 'firstName', $this->userFirstName);
            $this->setDefaultValueForParticipant(1, 'lastName', $this->userLastName);
            $this->setDefaultValueForParticipant(1, 'email', $this->userEmail);
            $this->setDefaultValueForParticipant(1, 'contact', $this->userContact);

            if (!$this->isGuest) {
                $this->setDefaultValueForParticipant(1, 'medicalDetails', $this->currentUser->medicalDetails);
                $this->hideMedicalDetailsFor[1] = true;
                $this->disableEmailChangeForParticipant[1] = true;
            }

            $currentUserIsParticipant = true;
        }

        // If current user is a manager of a participant and has a previous relation
        // with the participant, then copy the participant details to the form as participant 1
        if (!$currentUserIsParticipant && !$this->isGuest) {
            $this->currentUser->onBehalfOfParticipant->each(function ($participant) {
                if ($participant->pivot->user_role === 'participant') {
                    $this->setDefaultValueForParticipant(1, 'firstName', $participant->first_name);
                    $this->setDefaultValueForParticipant(1, 'lastName', $participant->last_name);
                    $this->setDefaultValueForParticipant(1, 'email', $participant->email);
                    $this->setDefaultValueForParticipant(1, 'contact', $participant->contact);

                    // loop through individuals and preset medical information if matches
                    for ($i = 1; $i <= $this->numberOfParticipants; $i++) {
                        if (isset($this->participant[$i]['email']) && $this->participant[$i]['email'] === $participant->email) {
                            $this->setDefaultValueForParticipant($i, 'medicalDetails', $participant->medicalDetails);
                            $this->hideMedicalDetailsFor[$i] = true;
                            $this->disableEmailChangeForParticipant[$i] = true;
                        }
                    }
                }
            });
        }

        if ($this->currentUserRoleForTrip === 'plan-nominee') {
            $numberOfParticipants = $this->numberOfParticipants;

            for ($i = 1; $i <= $numberOfParticipants; $i++) {
                $this->setDefaultValueForParticipant($i, 'planNomineeApplicable', 'Yes');
                $this->setDefaultValueForParticipant($i, 'planNomineeFirstName', $this->userFirstName);
                $this->setDefaultValueForParticipant($i, 'planNomineeLastName', $this->userLastName);
                $this->setDefaultValueForParticipant($i, 'planNomineeEmail', $this->userEmail);
                $this->setDefaultValueForParticipant($i, 'planNomineeContact', $this->userContact);
            }
        }

        if ($this->currentUserRoleForTrip === 'support-coordinator') {
            $numberOfParticipants = $this->numberOfParticipants;

            for ($i = 1; $i <= $numberOfParticipants; $i++) {
                $this->setDefaultValueForParticipant($i, 'supportCoordinatorApplicable', 'Yes');
                $this->setDefaultValueForParticipant($i, 'supportCoordinatorFirstName', $this->userFirstName);
                $this->setDefaultValueForParticipant($i, 'supportCoordinatorLastName', $this->userLastName);
                $this->setDefaultValueForParticipant($i, 'supportCoordinatorEmail', $this->userEmail);
                $this->setDefaultValueForParticipant($i, 'supportCoordinatorContact', $this->userContact);
            }
        }

        if ($this->currentUserRoleForTrip === 'appointed-guardian') {
            $numberOfParticipants = $this->numberOfParticipants;

            for ($i = 1; $i <= $numberOfParticipants; $i++) {
                $this->setDefaultValueForParticipant($i, 'appointedGuardianApplicable', 'Yes');
                $this->setDefaultValueForParticipant($i, 'appointedGuardianFirstName', $this->userFirstName);
                $this->setDefaultValueForParticipant($i, 'appointedGuardianLastName', $this->userLastName);
                $this->setDefaultValueForParticipant($i, 'appointedGuardianEmail', $this->userEmail);
                $this->setDefaultValueForParticipant($i, 'appointedGuardianContact', $this->userContact);
            }
        }
    }
}
