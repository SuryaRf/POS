<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{



    public function index()
    {
        $user = UserModel::where('username', 'manager9')->firstOrFail();
        return view('user', ['data' => $user]);
        //tambah data user dengan Eloquent Model
        // $data = [
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2
        // ];
        // UserModel::create($data);

        // // coba akses model UserModel
        // $users = UserModel::all(); // ambil semua data dari tabel m_user
        // return view('user', ['data' => $users]);
    }

    public function user()
    {
        return view('POS.user');
    }
}
