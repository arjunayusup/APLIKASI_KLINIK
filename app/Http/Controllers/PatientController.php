<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'birth_date' => 'required|date',
            'gender' => 'required|in:L,P',
            'phone' => 'required',
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index')
            ->with('success', 'Pasien berhasil ditambahkan');
    }

    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }
}