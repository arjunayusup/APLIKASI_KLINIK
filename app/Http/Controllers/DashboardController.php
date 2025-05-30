<?php

namespace App\Http\Controllers;

use App\Models\Checkup;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $checkups = Checkup::with(['patient', 'nurse', 'doctor'])->get();
        return view('dashboard', compact('user','checkups'));
    }
}