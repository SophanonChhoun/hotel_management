<?php

namespace App\Http\Controllers;

use App\Models\admin\ContactUs;
use Illuminate\Http\Request;
use Exception;

class ContactUsController extends Controller
{
    public function index(Request $request)
    {
        $contacts_us = ContactUs::latest();
        if(isset($request->search))
        {
            $contacts_us = $contacts_us->where("title","LIKE","%".$request->search."%");
        }
        if(isset($request->is_enable))
        {
            $contacts_us = $contacts_us->where("is_enable",$request->is_enable);
        }
        $contacts_us = $contacts_us->get();
        return view("admin.contact_us.list",compact("contacts_us"));
    }

    public function create()
    {
        return view("admin.contact_us.create");
    }

    public function store(Request $request)
    {
        try {
            $data = ContactUs::create($request->all());
            return $this->success($data);
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $contact_us = ContactUs::find($id);

            return view("admin.contact_us.edit",compact("contact_us"));
        }catch (Exception $exception){
            return redirect("/admin/contact_us/list");
        }
    }

    public function update($id, Request $request)
    {
        try {
            $data = ContactUs::find($id)->update($request->all());

            return $this->success($data);
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

    public function updateStatus($id, Request $request)
    {
        try {
            ContactUs::find($id)->update([
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
            ContactUs::findOrFail($id)->delete();
            return back();
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }
}
