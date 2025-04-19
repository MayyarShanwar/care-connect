<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    /** @use HasFactory<\Database\Factories\MedicalRecordFactory> */
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'room_id',
        'blood_type',
        'admission_date',
        'discharge_date',
        'medicines',
        'details',
    ];

    protected $casts = ['medicines' => 'array'];


    public function doctor()
    {
        return $this->belongsTo(Doctor::class);

    }
    
    public function room()
    {
        return $this->belongsTo(Room::class);

    }   
    
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
