<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Input;
use App\Models\admin\Customer;
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
        $customer = Customer::all();
        return view("admin.customer.list",compact("customer"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
    //     if (Customer::where('email', '=', Input::get('email'))->exists()) {
    //         return $this->success('fail');
    //      }
    //  $messages = ['email.unqiue'=>'email already taken'];
    //     $this->validate($request, [
    //         'email' => 'required|unique:customers',
    //     ],$messages);

    $request->validate([
        'email' => 'required|unique:customers',
       
    ]);
        Customer::create([
            'first_name'=>$request['first_name'],
            'last_name'=>$request['last_name'],
            'email'=>$request['email'],
            'password'=>$request['password'],
            // 'confirm_password'=>$request['confirm_password'],
            'phone_number'=>$request['phone_number'],
            'dob'=>$request['dob'],
            'gender'=>$request['gender'],
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
            $customer = Customer::find($id);
            return view('admin.customer.edit',compact('customer'));
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
        $customer = Customer::find($id);
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
        $request->validate([
            'email' => 'required|unique:customers',   
        ]);

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

    
    // public function updateStatus(Request $request, $id)
    // {
    //     try {
    //         $customer = Customer::find($id)->update([
    //             "is_enable" => $request->is_enable
    //         ]);
    //         return back();
    //     }catch (Exception $exception){
    //         return $this->fail($exception->getMessage());
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin\Customer  $customer
     * @return \Illuminate\Http\Response
     */
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
