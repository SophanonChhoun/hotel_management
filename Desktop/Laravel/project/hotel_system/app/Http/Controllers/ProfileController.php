<?php

namespace App\Http\Controllers;

use App\Models\admin\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $data = User::with("media")->find(auth()->user()->id);

        return view('admin.profile.index',compact('data'));
    }
}
