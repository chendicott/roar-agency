<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class TripController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $trips = Trip::all();

        return view('admin.dashboard', compact('trips'));
    }
}
