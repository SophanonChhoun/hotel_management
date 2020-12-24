<?php

namespace App\Http\Controllers;

use App\Core\MediaLib;
use App\Http\Resources\customer\SliderResource;
use App\Models\admin\Hotel;
use App\Models\admin\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class SlidersController extends Controller
{
    public function index()
    {
        $sliders = Sliders::with("media","hotel");
        if(isset($request->search))
        {
            $sliders = $sliders->where("title","LIKE","%".$request->search."%");
        }
        if(isset($request->is_enable))
        {
            $sliders = $sliders->where("is_enable",$request->is_enable);
        }

        $data = $sliders->paginate(10);
        return view("admin.slider.list",compact('data'));
    }

    public function indexCustomer()
    {
        try {
            $slider = Sliders::with("media")->where("is_enable",1)->get();

            return $this->success(SliderResource::collection($slider));
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function create()
    {
        $hotels = Hotel::where("is_enable",1)->get();
        return view("admin.slider.create",compact("hotels"));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $slider = [
                "caption" => $request['caption'],
                "title" => $request['title'],
                "description" => $request['description'],
                "hotel_id" => $request['hotel_id'],
                "is_enable" => $request['is_enable']
            ];
            if($request['image'])
            {
                $slider['media_id'] = MediaLib::generateImageBase64($request['image']);
            }
            $data = Sliders::create($slider);
            DB::commit();
            return $this->success($data);
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $slider = Sliders::with("hotel","media")->find($id);
            $hotels = Hotel::where("is_enable",1)->get();
            return view('admin.slider.edit',compact('slider','hotels'));
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function update($id,Request $request)
    {
        DB::beginTransaction();
        try {
            $slider = Sliders::find($id);
            if(!$slider)
            {
                return $this->fail("There is no slider");
            }
            $data = [
                "caption" => $request['caption'],
                "title" => $request['title'],
                "description" => $request['description'],
                "hotel_id" => $request['hotel_id'],
                "is_enable" => $request['is_enable']
            ];
            if($request['image'])
            {
                $data['media_id'] = MediaLib::generateImageBase64($request['image']);
            }
            $slider = $slider->update($data);
            DB::commit();
            return $this->success($slider);
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception->getMessage());
        }
    }

    public function updateStatus(Request $request,$id)
    {
        try {
            Sliders::find($id)->update([
                "is_enable" => $request->is_enable
            ]);
            return back();
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Sliders::findOrFail($id)->delete();

            return back();
        }catch (Exception $e){
            return $this->fail($e->getMessage());
        }
    }
}
