<?php

namespace App\Http\Controllers;

use App\Models\admin\AboutUs;
use Illuminate\Http\Request;
use Exception;

class AboutUsController extends Controller
{
    public function show($id = 1)
    {
        $about_us = AboutUs::find($id);

        return view("admin.about_us.edit",compact("about_us"));
    }

    public function update(Request $request,$id = 1)
    {
        try {
            $data = AboutUs::find($id)->update($request->all());

            return $this->success($data);
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }
}
