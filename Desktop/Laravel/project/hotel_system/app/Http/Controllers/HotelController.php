<?php

namespace App\Http\Controllers;

use App\Core\MediaLib;
use App\Models\admin\Hotel;
use Illuminate\Http\Request;
use Exception;
use DB;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $hotels = Hotel::with("media");
        if(isset($request->search))
        {
            $hotels = $hotels->where("name","LIKE","%".$request->search."%");
        }
        if(isset($request->is_enable))
        {
            $hotels = $hotels->where("is_enable",$request->is_enable);
        }

        $hotels = $hotels->get();
        return view("admin.hotel.list",compact("hotels"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hotel.create');
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
            $hotel = [
              "name" => $request->name,
              "street_address" => $request->street_address,
              "city" => $request->city,
              "country" => $request->country,
              "zip" => $request->zip,
              "is_enable" => $request->is_enable,
            ];
            if(isset($request['image']))
            {
                $hotel['media_id'] = MediaLib::generateImageBase64($request['image']);
            }
            $data = Hotel::create([
                'name' => $hotel['name'],
                "street_address" => $hotel['street_address'],
                "city" => $hotel['city'],
                "country" => $hotel['country'],
                "zip" => $hotel['zip'],
                "media_id" => $hotel['media_id'],
                "is_enable" => $hotel['is_enable'],
            ]);

            DB::commit();
            return $this->success($data);
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception);
        }
    }

    public function show($id)
    {
        try {
            $hotel = Hotel::with("media")->find($id);
            return view('admin.hotel.edit',compact('hotel'));
        }catch (Exception $exception){
            return redirect('/admin/hotel/list');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {

            $hotel = Hotel::find($id);
            if(!$hotel)
            {
                return $this->fail("Cannot find this hotel");
            }
            $data = [
                "name" => $request->name,
                "street_address" => $request->street_address,
                "city" => $request->city,
                "country" => $request->country,
                "zip" => $request->zip,
                "is_enable" => $request->is_enable,
            ];
            if(isset($request['image']))
            {
                $data['media_id'] = MediaLib::generateImageBase64($request['image']);
            }
            $hotel = $hotel->update($data);

            if(!$hotel)
            {
                return $this->fail("Fail cannot update");
            }

            DB::commit();
            return $this->success($hotel);
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception);
        }
    }

    public function updateStatus($id,Request $request)
    {
        try {
            Hotel::find($id)->update([
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
     * @param  \App\Models\admin\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Hotel::findOrFail($id)->delete();

            return back();
        }catch (Exception $e){
            return $this->fail($e->getMessage());
        }
    }
}
