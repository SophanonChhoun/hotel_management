<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Input;
use App\Models\admin\Customer;
use App\Models\admin\IdentificationType;
use Illuminate\Http\Request;
use Exception;
use DB;





class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::with("identification_type")->get();
        return view("admin.customer.list",compact("customer"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $identification_type = IdentificationType::where("is_enable",1)->get();
        return view('admin.customer.create',compact("identification_type"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = Customer::where("email",$request->email)->first();
        if($customer)
        {
            return $this->fail("Please input another email");
        }
        Customer::create([
            'first_name'=>$request['first_name'],
            'last_name'=>$request['last_name'],
            'email'=>$request['email'],
            'password'=>$request['password'],
            'phone_number'=>$request['phone_number'],
            'dob'=>$request['dob'],
            'gender'=>$request['gender'],
            'identification_type_id'=>$request['identification_type_id'],
            'identification_id'=>$request['identification_id'],
            'street_address'=>$request['street_address'],
            'city'=>$request['city'],
            'country'=>$request['country'],
            'zip'=>$request['zip'],
            'is_enable'=>$request['is_enable'],
        ]);

        return $this->success('success');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            // return view('admin.customer.edit');
            $customer = Customer::with("identification_type")->find($id);
            $identification_type = IdentificationType::where("is_enable",1)->get();
            return view('admin.customer.edit',compact('customer','identification_type'));
        }catch (Exception $exception){
            return redirect('/admin/customer/list');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::with("identification_type")->find($id);
        return view("admin.customer.edit")->with('customer',$customer);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        DB::beginTransaction();
        try {

            $customer = Customer::find($id);
            if(!$customer)
            {
                return $this->fail("Cannot find this customer");
            }
            $data = [

                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "email" => $request->email,
                "password" => $request->password,
                "phone_number" => $request->phone_number,
                "dob" => $request->dob,
                "gender" => $request->gender,
                "identification_type_id" => $request->identification_type_id,
                "identification_id" => $request->identification_id,
                "street_address" => $request->street_address,
                "city" => $request->city,
                "country" => $request->country,
                "zip" => $request->zip,
                "is_enable" => $request->is_enable,
            ];

            $customer = $customer->update($data);

            if(!$customer)
            {
                return $this->fail("Fail cannot update");
            }

            DB::commit();
            return $this->success($customer);
        }catch (Exception $exception){
            DB::rollBack();
            return $this->fail($exception);
        }

    }

    public function updateStatus($id,Request $request)
    {
        try {
            Customer::find($id)->update([
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
            $customer = Customer::find($id)->delete();
            return back();
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }
}
