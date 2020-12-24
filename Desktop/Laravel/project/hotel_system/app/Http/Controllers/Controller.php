<?php

namespace App\Http\Controllers;

use http\Env\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected function formatValidationErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
    public function success ($data)
    {
        return response()->json(['success' => true, 'data' => $data]);
    }

    public function fail($message)
    {
        return response()->json(['success' => false, 'data' => $message]);
    }
  
}
