<?php

namespace App\Http\Controllers;

use App\Core\MediaLib;
use App\Http\Resources\HotelListResource;
use App\Http\Resources\HotelShowResource;
use App\Http\Resources\MediasResource;
use App\Models\admin\Hotel;
use App\Models\admin\HotelMediaMap;
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
        $hotels = Hotel::with("medias");
        if(isset($request->search))
        {
            $hotels = $hotels->where("name","LIKE","%".$request->search."%");
        }
        if(isset($request->is_enable))
        {
            $hotels = $hotels->where("is_enable",$request->is_enable);
        }

        $data = $hotels->paginate(10);
        return view("admin.hotel.list",compact("data"));
    }

    public function indexCustomer()
    {
        try {
            $hotels = Hotel::with("medias")->where("is_enable",1)->get();

            return $this->success(HotelListResource::collection($hotels));
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function create()
    {
        return view('admin.hotel.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $hotel = [
              "name" => $request->name,
              "street_address" => $request->street_address,
              "description" => $request->description,
              "city" => $request->city,
              "country" => $request->country,
              "zip" => $request->zip,
              "is_enable" => $request->is_enable,
            ];
            $data = Hotel::create([
                'name' => $hotel['name'],
                "street_address" => $hotel['street_address'],
                "city" => $hotel['city'],
                "country" => $hotel['country'],
                "zip" => $hotel['zip'],
                "is_enable" => $hotel['is_enable'],
                "description" => $hotel['description']
            ]);
            if(filled($request->medias))
            {
                HotelMediaMap::store($request->medias,$data->id);
            }

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
            $hotel = Hotel::with("medias")->find($id);
            return view('admin.hotel.edit',compact('hotel'));
        }catch (Exception $exception){
            return redirect('/admin/hotel/list');
        }
    }

    public function showCustomer($id)
    {
        try {
            $hotel = Hotel::with("medias")->find($id);
            $is_enable = $hotel->is_enable ?? null;
            if(!$hotel || !$is_enable)
            {
                return $this->fail("Hotel not found");
            }
            return $this->success([
                'id' => $hotel->id,
                'title' => $hotel->name,
                'street_address' => $hotel->street_address,
                'city' => $hotel->city,
                'country' => $hotel->country,
                'description' => $hotel->description,
                'medias' => MediasResource::collection($hotel->medias),
            ]);
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

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
                "description" => $request->description,
                "street_address" => $request->street_address,
                "city" => $request->city,
                "country" => $request->country,
                "zip" => $request->zip,
                "is_enable" => $request->is_enable,
            ];
            $hotel = $hotel->update($data);
            if(filled($request->medias))
            {
                HotelMediaMap::store($request->medias,$id);
            }
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
