<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = UserModel::where('level_id', 2)->count();
        //dd($user);
        return view('user', ['data' => $user]);
    }
}



// Ambil model dengan kunci utamanya...
// $user = UserModel::find(1);

// Ambil model pertama yang cocok dengan batasan kueri...
// $user = UserModel::where('active', 1)->first();

// Alternatif untuk mengambil model pertama yang cocok dengan batasan kueri...
// $user = UserModel::firstWhere('active', 1);

// $user = UserModel::all();
// $data = [
//     'nama' => 'Pelanggan Pertama'
// ];
// UserModel::where('username', 'customer-1')->update($data);

        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 4
        // ];
        // UserModel::insert($data);
