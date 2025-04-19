<?php

namespace App\Http\Controllers;

use App\Models\Surgery;
use App\Http\Requests\StoreSurgeryRequest;
use App\Http\Requests\UpdateSurgeryRequest;
use Illuminate\Http\Request;

class SurgeryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $surgeries = Surgery::latest()->with(['doctor','room','patient'])->paginate(10, ['*'], 'page', $request->page)->all();
        $pagination = Surgery::latest()->Paginate(10);
        return response()->json(['data' => $surgeries, 'pagination' => $pagination]);
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
    public function store(StoreSurgeryRequest $request)
    {
        $surgery = $request->validate([
            'operation_name'=>'required',
            'doctor_id'=>'required',
            'room_id'=>'required',
            'patient_id'=>'required',
            'duration'=>'required',
            'schedule_date'=>'required',
        ]);
        Surgery::create($surgery);
        return response(200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Surgery $surgery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $surgery = Surgery::with(['doctor','room','patient'])->find(request('id'));
        return response()->json(['data'=>$surgery]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSurgeryRequest $request)
    {
        $valSurgery = $request->validate([
            'operation_name'=>'required',
            'doctor_id'=>'required',
            'room_id'=>'required',
            'patient_id'=>'required',
            'duration'=>'required',
            'schedule_date'=>'required',
        ]);
        $surgery = Surgery::find($request->id);
        $surgery->update($valSurgery);
        return response(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Surgery::find(request('id'))->delete();
        return response(200);
    }
}
