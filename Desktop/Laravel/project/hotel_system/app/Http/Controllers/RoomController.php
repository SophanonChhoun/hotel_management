<?php

namespace App\Http\Controllers;

use App\Models\admin\Hotel;
use App\Models\admin\Room;
use App\Models\admin\RoomType;
use Illuminate\Http\Request;
use Exception;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::with("hotel","roomType")->get();

        return view("admin.rooms.list",compact("rooms"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $room_types = RoomType::where("is_enable",1)->get();
        $hotels = Hotel::where("is_enable",1)->get();

        return view("admin.rooms.create",compact("room_types","hotels"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            foreach ($request->data as $room)
            {
                Room::create($room);
            }

            return $this->success("Success");
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $room_types = RoomType::where("is_enable",1)->get();
            $hotels = Hotel::where("is_enable",1)->get();
            $room = Room::with("hotel","roomType")->find($id);
            return view('admin.rooms.edit',compact('room','room_types','hotels'));
        }catch (Exception $exception){
            return redirect('/admin/rooms/list');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $room = Room::find($id)->update($request->all());
            return $this->success($room);
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $room = Room::find($id)->update([
                "is_enable" => $request->is_enable
            ]);
            return back();
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $room = Room::find($id)->delete();
            return back();
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }
}
