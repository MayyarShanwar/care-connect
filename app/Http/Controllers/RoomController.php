<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\Console\Output\ConsoleOutput;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rooms = Room::latest()->with(['department'])->paginate(10, ['*'], 'page', $request->page)->all();
        $pagination = Room::latest()->Paginate(10);
        return response()->json(['data' => $rooms, 'pagination' => $pagination]);
    }

    public function roomList(Request $request)
    {
        $rooms = Room::latest()->get();
        return response()->json(['data' => $rooms]);
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
    public function store(StoreRoomRequest $request)
    {
        $room = $request->validate([
            'room_number' => ['required', 'unique:rooms'],
            'status' => ['required', Rule::in(['occupied', 'vacant', 'underMaintenance'])],
            'department_id' => ['required'],
            'type' => ['required', Rule::in(['ICU', 'general', 'surgical'])],
            'beds_number' => 'required'
        ]);

        Room::create($room);
        return response(200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $data = Room::with('department')->find(request('id'));
        return response()->json(['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        try {
            $request->validate([
                'room_number' => ['required'],
                'status' => ['required', Rule::in(['occupied', 'vacant', 'underMaintenance'])],
                'department_id' => ['required'],
                'type' => ['required', Rule::in(['ICU', 'general', 'surgical'])],
                'beds_number' => 'required'
            ]);
        } catch (\Throwable $th) {
            response($th);
        }
        
        $room = Room::find(request('id'));
        $room->update([
            'room_number'=>$request->room_number,
            'status'=>$request->status,
            'department_id'=>$request->department_id,
            'type'=>$request->type,
            'beds_number'=>$request->beds_number,
        ]);
        
        return response(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        Room::find(request('id'))->delete();
        return response(200);
    }
}
