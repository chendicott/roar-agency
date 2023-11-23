<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use stdClass;

class UserController extends Component
{
    use AuthorizesRequests;

    public User $user;
    public $medicalDetails = [];

    public $numberDiagnosis = 0;
    public $numberMedicalConditions = 0;
    public $numberMedication = 0;
    public $numberAllergies = 0;

    public $currentUserIsAdmin = false;

    public $newItems = [
        'diagnosis' => '',
        'medicalConditions' => '',
        'medication' => '',
        'allergies' => '',
    ];


    public bool $isEditing = false;

    protected $rules = [
        'user.name' => 'required|string|min:3',
        'user.dateofbirth' => 'required|date_format:d/m/Y|before:today',
        'user.email' => 'required|email|min:3',
    ];

    public function mount(User $user) {
        $this->authorize('view', $user);
        $this->user = $user;

        $this->currentUserIsAdmin = auth()->user()->isAdmin();

        $medicalDetail = $user->medicalDetails()->first();

        if ($medicalDetail) {
            $this->medicalDetails = json_decode(json_encode($medicalDetail->medical_data),true);
        } else {
            $this->medicalDetails = [];
        }

        if (isset($this->medicalDetails['diagnosis'])) {
            $this->numberDiagnosis = count($this->medicalDetails['diagnosis']);
        }

        if (isset($this->medicalDetails['medicalConditions'])) {
            $this->numberMedicalConditions = count($this->medicalDetails['medicalConditions']);
        }

        if (isset($this->medicalDetails['medication'])) {
            $this->numberMedication = count($this->medicalDetails['medication']);
        }

        if (isset($this->medicalDetails['allergies'])) {
            $this->numberAllergies = count($this->medicalDetails['allergies']);
        }
    }

    public function toggleEdit() {
        $this->isEditing = true;
    }

    public function addItem($item, $count) {
        if ($this->newItems[$item] === '') return;

        if (!isset($this->medicalDetails[$item])) {
            $this->medicalDetails[$item] = [];
        }

        $this->medicalDetails[$item][] = $this->newItems[$item];
        $this->$count++;
        $this->newItems[$item] = '';
    }

    public function removeItem($item, $count, $index) {
        unset($this->medicalDetails[$item][$index]);
        $this->$count--;
    }

    public function cancelEdit() {
        $this->user->refresh();
        $this->isEditing = false;
    }

    public function saveDetails(): void
    {
        $this->validate();
        $this->authorize('edit', $this->user);
        $this->user->save();
        $this->isEditing = false;
    }

    public function saveMedical(): void
    {
        $this->authorize('edit', $this->user);
        $this->user->medicalDetails()->updateOrCreate([], ['medical_data' => $this->medicalDetails]);
        $this->isEditing = false;
    }

    public function render()
    {
        return view('livewire.user-controller');
    }
}
