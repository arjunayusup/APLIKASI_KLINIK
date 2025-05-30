<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = ['checkup_id', 'medicine_id', 'pharmacist_id', 'instruction'];

    public function checkup()
    {
        return $this->belongsTo(Checkup::class);
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }

    public function pharmacist()
    {
        return $this->belongsTo(User::class, 'pharmacist_id');
    }
}