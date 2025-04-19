<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surgery extends Model
{
    /** @use HasFactory<\Database\Factories\SurgeryFactory> */
    use HasFactory;
    protected $fillable = [
        'operation_name',
        'patient_id',
        'doctor_id',
        'room_id',
        'duration',
        'schedule_date'
    ];

    /**
     * Get the user that owns the Surgery
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
