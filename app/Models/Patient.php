<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'birth_date', 'gender', 'phone'];

    public function checkups()
    {
        return $this->hasMany(Checkup::class);
    }
}