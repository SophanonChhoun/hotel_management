<?php

namespace App\Http\Controllers;

use App\Models\admin\Hotel;
use Illuminate\Http\Request;
use Exception;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::all();
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
        try {
            $hotel = Hotel::create($request->all());
            if(!$hotel)
            {
                return $this->fail("Fail cannot create");
            }
            return $this->success($hotel);
        }catch (Exception $exception){
            return $this->fail($exception);
        }
    }

    public function show($id)
    {
        try {
            $hotel = Hotel::find($id);
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
        try {
            $hotel = Hotel::find($id);
            if(!$hotel)
            {
                return $this->fail("Cannot find this hotel");
            }
            $hotel = $hotel->update($request->all());
            if(!$hotel)
            {
                return $this->fail("Fail cannot update");
            }
            return $this->success($hotel);
        }catch (Exception $exception){
            return $this->fail($exception);
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

            return redirect('/admin/hotel/list');
        }catch (Exception $e){
            return $this->fail($e->getMessage());
        }
    }
}
