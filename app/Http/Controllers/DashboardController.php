<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $trips = $user->tripsAsParticipant()->get();

        return view('user.dashboard', compact('trips'));
    }
}
