<?php

namespace App\Http\Controllers;

use App\Models\Checkup;
use App\Models\Medicine;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function create(Checkup $checkup)
    {
        $medicines = Medicine::all();
        return view('prescriptions.create', compact('checkup', 'medicines'));
    }

    public function store(Request $request, Checkup $checkup)
    {
        $request->validate([
            'medicine_id' => 'required|exists:medicines,id',
            'instruction' => 'required',
        ]);

        Prescription::create([
            'checkup_id' => $checkup->id,
            'medicine_id' => $request->medicine_id,
            'pharmacist_id' => auth()->id(),
            'instruction' => $request->instruction,
        ]);

        return redirect()->route('checkups.show', $checkup)
            ->with('success', 'Resep berhasil ditambahkan');
    }
}