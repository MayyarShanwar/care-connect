<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use Dotenv\Store\File\Paths;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $patients = Patient::latest()->paginate(10, ['*'], 'page', $request->page)->all();
        $pagination = Patient::latest()->Paginate(10);
        return response()->json(['data' => $patients, 'pagination' => $pagination]);
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
    public function store(StorePatientRequest $request)
    {
        $patient = $request->validate([
            'name' => ['required', 'unique:patients'],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'mobile_number' => ['required'],
            'birth_date' => ['required'],
            'medical_description' => 'required',
            'address'=>'required'
        ]);

        Patient::create($patient);
        return response(200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $patient = Patient::find(request('id'));

        return response()->json(['data'=>$patient]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request)
    {
        $newPatient = $request->validate([
            'name' => ['required', 'unique:patients'],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'mobile_number' => ['required'],
            'birth_date' => ['required'],
            'medical_description' => 'required',
            'address'=>'required'
        ]);

        $patient = Patient::find(request('id'));

        $patient->update($newPatient);
        return response(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Patient::find(request('id'))->delete();
        return response(200);
        
    }
}
