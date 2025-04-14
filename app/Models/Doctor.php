<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    /** @use HasFactory<\Database\Factories\DoctorFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'department_id',
        'salary',
        'start_work',
        'end_work',
        'days',
        'speciality',
        'mobile_number',
        'job_date',
        'address',
    ];

    protected $casts = ['days' => 'array'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
