<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{



    public function index()
    {
        $userCount = UserModel::where('level_id', 2)->count();
        // dd($user);
        return view('user', ['userCount' => $userCount]); 
        
    }

    public function user()
    {
        return view('POS.user');
    }
}
