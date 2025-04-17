<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use Symfony\Component\Console\Output\ConsoleOutput;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::with('department')->latest()->get();
        $doctors->transform(function ($doctor) {
            return [
                'id' => $doctor->id,
                'name' => $doctor->name,
                'image' => $doctor->image ? Storage::url($doctor->image) : null,
                'department' => $doctor->department,
                'salary' => $doctor->salary,
                'start_work' => $doctor->start_work,
                'end_work' => $doctor->end_work,
                'days' => $doctor->days,
                'speciality' => $doctor->speciality,
                'mobile_number' => $doctor->mobile_number,
                'job_date' => $doctor->job_date,
                'address' => $doctor->address,
                'created_at' => $doctor->created_at,
                'updated_at' => $doctor->updated_at
            ];
        });
        return response()->json(['data' => $doctors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorRequest $request)
    {
        
        $doctor = $request->validate([
            'name' => ['required', 'unique:doctors'],
            'department_id' => ['required'],
            'salary' => 'required',
            'start_work' => 'required|date_format:H:i',
            'end_work' => 'required|date_format:H:i|after:start_work',
            'speciality' => 'required',
            'mobile_number' => 'required',
            'job_date' => 'required',
            'address' => 'required',
            'days' => 'required|array|min:1',
            'days.*' => 'string|in:Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday',
        ]);
        // $consloe = new ConsoleOutput();
        // $consloe->writeln($doctor['days']);
        // dd('km');
        $path = '';
        if ($request->file('image')) {
            $path = $request->file('image')->store('doctor_images', 'local');
        } else {
            return response('501');
        }

        Doctor::create([
            'name' => $request->name,
            'department_id' => $request->department_id,
            'image' => $path,
            'salary' => $request->salary,
            'start_work' => $request->start_work,
            'end_work' => $request->end_work,
            'days' => $request->days,
            'speciality' => $request->speciality,
            'mobile_number' => $request->mobile_number,
            'job_date' => $request->job_date,
            'address' => $request->address,
        ]);

        return response(200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $doctor = Doctor::with('department')->find(request('id'));
        $data = [
            'id' => $doctor->id,
            'name' => $doctor->name,
            'image' => $doctor->image ? Storage::url($doctor->image) : null,
            'department' => $doctor->department,
            'salary' => $doctor->salary,
            'start_work' => $doctor->start_work,
            'end_work' => $doctor->end_work,
            'days' => $doctor->days,
            'speciality' => $doctor->speciality,
            'mobile_number' => $doctor->mobile_number,
            'job_date' => $doctor->job_date,
            'address' => $doctor->address,
            'created_at' => $doctor->created_at,
            'updated_at' => $doctor->updated_at
        ];
        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorRequest $request)
    {
        $editDoctor = $request->validate([
            'name' => ['required'],
            'department_id' => ['required'],
            'salary' => 'required',
            'start_work' => 'required|date_format:H:i',
            'end_work' => 'required|date_format:H:i|after:start_work',
            'speciality' => 'required',
            'mobile_number' => 'required',
            'job_date' => 'required',
            'address' => 'required',
            'days' => 'required|array|min:1',
            'days.*' => 'string|in:Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday',
        ]);
        $doctor = Doctor::with('department')->find(request('id'));
        $path = '';
        if ($request->file('image')) {
        //     $consloe = new ConsoleOutput();
        // $consloe->writeln(Storage::url($doctor->image)); 
            if (Storage::exists($doctor->image)) {
                Storage::delete($doctor->image);
            }
            $path = $request->file('image')->store('doctor_images', 'local');
            $doctor->update([
                'name' => $request->name,
                'department_id' => $request->department_id,
                'image' => $path,
                'salary' => $request->salary,
                'start_work' => $request->start_work,
                'end_work' => $request->end_work,
                'days' => $request->days,
                'speciality' => $request->speciality,
                'mobile_number' => $request->mobile_number,
                'job_date' => $request->job_date,
                'address' => $request->address,
            ]);
        } 

        $doctor->update([
            'name' => $request->name,
            'department_id' => $request->department_id,
            'salary' => $request->salary,
            'start_work' => $request->start_work,
            'end_work' => $request->end_work,
            'days' => $request->days,
            'speciality' => $request->speciality,
            'mobile_number' => $request->mobile_number,
            'job_date' => $request->job_date,
            'address' => $request->address,
        ]);

        return response(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        Doctor::find(request('id'))->delete();
        return response(200);
    }
}
