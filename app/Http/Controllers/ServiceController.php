<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Symfony\Component\Console\Output\ConsoleOutput;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $consloe = new ConsoleOutput();
        // $consloe->writeln('456'.request());
        $services = Service::latest()->with(['department'])->get();
        return response()->json(['data' => $services]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        $service = $request->validate([
            'name' => ['required', 'unique:services'],
            'department_id' => ['required'],
            'description' => 'required'
        ]);

        Service::create($service);
        return response(200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        
        $service = Service::with(['department'])->find(request('id'));
        // $consloe = new ConsoleOutput();
        // $consloe->writeln($service);
        return response()->json(['data'=>$service]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request)
    {
        $request->validate([
            'name' => ['required', 'unique:services'],
            'department_id' => ['required'],
            'description' => 'required'
        ]);

        $service = Service::find(request('id'));

        $service->update([
            'name' => $request->name,
            'department_id' => $request->department_id,
            'description' => $request->description
        ]);

        return response(200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        Service::find(request('id'))->delete();
        response(200);
    }
}
