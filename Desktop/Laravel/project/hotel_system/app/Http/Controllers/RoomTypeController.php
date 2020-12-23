<?php

namespace App\Http\Controllers;

use App\Core\MediaLib;
use App\Models\admin\RoomType;
use App\Models\admin\RoomTypeMediaMap;
use Illuminate\Http\Request;
use Exception;
use DB;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $room_types = RoomType::with("medias");
        if(isset($request->search))
        {
            $room_types = $room_types->where("name","LIKE","%".$request->search."%");
        }
        if(isset($request->is_enable))
        {
            $room_types = $room_types->where("is_enable",$request->is_enable);
        }
        $data = $room_types->simplePaginate(10);

        return view('admin.room_type.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.room_type.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $room_type = [
                "name" => $request->name,
                "description" => $request->description,
                "price" => $request->price,
                "is_enable" => $request->is_enable
            ];
            $data = RoomType::create($room_type);
            if(filled($request->medias))
            {
                RoomTypeMediaMap::store($request->medias,$data->id);
            }

            DB::commit();
            return $this->success($data);
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $room_type = RoomType::with("medias")->find($id);
            return view("admin.room_type.edit",compact("room_type"));
        }catch (Exception $exception){
            return $this->fail($exception);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $roomType = RoomType::find($id);
            if(!$roomType)
            {
                return $this->fail("Cannot find this room type");
            }
            $room_type = [
                "name" => $request->name,
                "description" => $request->description,
                "price" => $request->price,
                "is_enable" => $request->is_enable
            ];
            $data = $roomType->update($room_type);
            if(filled($request->medias))
            {
                RoomTypeMediaMap::store($request->medias,$id);
            }
            if(!$data)
            {
                return $this->fail("Cannot update this room type");
            }

            DB::commit();
            return $this->success($data);
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception->getMessage());
        }
    }

    public function updateStatus(Request $request,$id)
    {
        try {
            RoomType::find($id)->update([
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
     * @param  \App\Models\admin\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            RoomType::findOrFail($id)->delete();

            return back();
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }
}
