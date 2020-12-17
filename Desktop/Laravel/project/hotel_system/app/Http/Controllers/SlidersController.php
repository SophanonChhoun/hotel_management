<?php

namespace App\Http\Controllers;

use App\Core\MediaLib;
use App\Models\admin\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SlidersController extends Controller
{
    public function index()
    {
        $sliders = Sliders::with("media")->get()->filter(function($item){
            $item->error = "";
            return $item;
        });

        return view("admin.slider.edit",compact('sliders'));
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $idS = array_column($request->data,"id");
            Sliders::whereNotIn("id",$idS)->delete();
            foreach ($request->data as $slider)
            {
                $data = [
                    'is_enable' => $slider['is_enable']
                ];

                if(isset($slider['image']))
                {
                    $data['media_id'] = MediaLib::generateImageBase64($slider['image']);
                }

                Sliders::updateOrCreate([
                    "id" => $slider['id'] ?? null
                ],$data);
            }

            DB::commit();
            return $this->success("Success");
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception->getMessage());
        }
    }
}
