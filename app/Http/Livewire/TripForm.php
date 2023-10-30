<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TripForm extends Component
{
    public function render()
    {
        return view('livewire.trip-form')->layout('layouts.guest');
    }
}
