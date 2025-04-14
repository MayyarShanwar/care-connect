<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use Illuminate\Http\Request;
use Symfony\Component\Console\Output\ConsoleOutput;

use function Pest\Laravel\json;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::latest()->get();
        return response()->json(['data'=>$departments]);
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
    public function store(StoreDepartmentRequest $request)
    {

        $department = $request->validate([
            'name'=>'required',
            'phone_number'=>'required',
            'description'=>'required',
        ]);

        Department::create($department);

        return response(200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        
        $data = Department::find(request('id'));
        return response()->json(['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request)
    {
        // $consloe = new ConsoleOutput();
        // $consloe->writeln('456'.$request);
        try {
            request()->validate([
                'name'=>'required',
                'phone_number'=>'required',
                'description'=>'required',
            ]);
        } catch (\Throwable $th) {
            response($th);
        }
        
        $department = Department::find(request('id'));
        $department->update([
            'name'=>$request->name,
            'phone_number'=>$request->phone_number,
            'description'=>$request->description,
        ]);
        
        return response(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $consloe = new ConsoleOutput();
        $consloe->writeln('456'.$request);
        Department::find($request->id)->delete();
        return response(200);

    }
}
