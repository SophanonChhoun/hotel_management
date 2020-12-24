<?php

namespace App\Http\Controllers;

use http\Env\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success ($data)
    {
        return response()->json(['success' => true, 'data' => $data]);
    }

    public function fail($message,$code = 403)
    {
        if($code == 500)
        {
            return response()->json(['success' => false, 'data' => "There is something wrong"]);
        }
        return response()->json(['success' => false, 'data' => $message]);
    }
}
