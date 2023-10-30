<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $trips = Trip::all();

        return view('admin.dashboard', compact('trips'));
    }
}
