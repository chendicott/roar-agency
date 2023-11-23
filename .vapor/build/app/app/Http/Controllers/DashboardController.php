<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $trips = $user->tripsAsParticipant()->get();

        $numberOfRequestedTrips = $trips->where('status', 'requested')->count();
        $numberOfConfirmedTrips = $trips->where('status', 'confirmed')->count();
        $numberOfCompletedTrips = $trips->where('status', 'completed')->count();

        return view('user.dashboard', compact('trips', 'numberOfRequestedTrips', 'numberOfConfirmedTrips', 'numberOfCompletedTrips'));
    }
}
