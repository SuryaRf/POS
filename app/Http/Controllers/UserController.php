<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{



    public function index()
    {
        $user = UserModel::firstOrNew(
            [
                'username' => 'manager11',
                'nama' => 'Manager11',
                'password' => Hash::make('12345'),
                'level_id' => 2
            ]
        );
        $user->username = 'manager12';

        $user->save();

        $user->wasChanged();
        $user->wasChanged('username');
        $user->wasChanged('nama');
        $user->wasChanged(['nama', 'username']);
        dd($user->wasChanged(['nama', 'username']));
    }

    public function user()
    {
        return view('POS.user');
    }
}
