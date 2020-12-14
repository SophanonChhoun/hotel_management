<?php

namespace App\Http\Controllers;

use App\Models\admin\IdentificationType;
use Illuminate\Http\Request;
use Exception;

class IdentificationTypeController extends Controller
{
    public function index()
    {
        $identification_type = IdentificationType::all();
        return view("admin.identification_type.edit",compact("identification_type"));
    }


    public function update(Request $request)
    {
        try {
            $idS = array_column($request->data,"id");
            IdentificationType::whereNotIn("id",$idS)->delete();
            foreach ($request->data as $identification_type)
            {
                $data = [
                  'name' => $identification_type['name'],
                  'is_enable' => $identification_type['is_enable']
                ];

                $data = IdentificationType::updateOrCreate([
                    "id" => $identification_type['id'] ?? null
                ],$data);
            }

            return $this->success("Success");
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

}
