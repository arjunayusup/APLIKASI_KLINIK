<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Checkup;
use App\Models\Patient;
use Illuminate\Http\Request;

class CheckupController extends Controller
{
    public function index()
    {
        $checkups = Checkup::with(['patient', 'nurse', 'doctor'])->get();
        return view('checkups.index', compact('checkups'));
    }

    public function create()
    {
        $patients = Patient::all();
        $dokters = User::where('role', 'dokter')->get();
        return view('checkups.create', compact('patients', 'dokters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
        ]);

        $checkup = new Checkup();
        $checkup->patient_id = $request->patient_id;
        $checkup->doctor_id = $request->doctor_id;
        $checkup->nurse_id = auth()->id();
        $checkup->save();

        return redirect()->route('checkups.index')
            ->with('success', 'Pemeriksaan berhasil dibuat');
    }

    public function edit(Checkup $checkup)
    {
        return view('checkups.edit', compact('checkup'));
    }

    public function update(Request $request, Checkup $checkup)
    {
        $user = auth()->user();
        
        if ($user->role === 'perawat') {
            $request->validate([
                'weight' => 'required|numeric',
                'blood_pressure' => 'required',
            ]);
            
            $checkup->update([
                'weight' => $request->weight,
                'blood_pressure' => $request->blood_pressure,
            ]);
        } elseif ($user->role === 'dokter') {
            $request->validate([
                'complaint' => 'required',
                'diagnosis' => 'required',
            ]);
            
            $checkup->update([
                'doctor_id' => $user->id,
                'complaint' => $request->complaint,
                'diagnosis' => $request->diagnosis,
            ]);
        }

        return redirect()->route('checkups.index')
            ->with('success', 'Pemeriksaan berhasil diperbarui');
    }

    public function show(Checkup $checkup)
    {
        return view('checkups.show', compact('checkup'));
    }
}