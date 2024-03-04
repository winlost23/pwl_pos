<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = UserModel::with('level')->get();
        return view('user', ['data' => $user]);
    }


    // $user = UserModel::all();
    // return view('user', ['data' => $user]);
    public function tambah()
    {
        return view('user_tambah');
    }

    public function tambah_simpan(Request $request)
    {
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make('$request->password'),
            'level_id' => $request->level_id
        ]);

        return redirect('/user');
    }

    public function ubah($id)
    {
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);
    }

    public function ubah_simpan($id, Request $request)
    {
        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make('$request->password');
        $user->level_id = $request->level_id;

        $user->save();

        return redirect('/user');
    }

    public function hapus($id)
    {
        $user = UserModel::find($id);
        $user->delete();

        return redirect('/user');
    }
}

// public function tambah()
// {
//     return view('user_tambah');
// }

// public function tambah_simpan(Request $request)
// {
//     UserModel::create([
//         'username' => $request->username,
//         'nama' => $request->nama,
//         'password' => Hash::make('$request->password'),
//         'level_id' => $request->level_id
//     ]);

//     return redirect('/user');
// }
// $user->isDirty(); // true
// $user->isDirty('username'); // true
// $user->isDirty('nama'); // false
// $user->isDirty(['nama', 'username']); // true

// $user->isClean(); // false
// $user->isClean('username'); // false
// $user->isClean('nama'); // true
// $user->isClean(['nama', 'username']); // false

// $user->isDirty(); // false
// $user->isClean(); // true
// dd($user->isDirty());
//return view('user', ['data' => $user]);
// $user = UserModel::firstOrCreate(
//     [
//         'username' => 'manager22',
//         'nama' => 'Manager Dua Dua',
//         'password' => Hash::make('12345'),
//         'level_id' => 2
//     ],
// );

// $user = UserModel::firstOrNew(
//     [
//         'username' => 'manager',
//         'nama' => 'Manager',
//     ],
// );
// $user = UserModel::where('level_id', 2)->count();
//dd($user);


// Ambil model dengan kunci utamanya...
// $user = UserModel::find(1);

// Ambil model pertama yang cocok dengan batasan kueri...
// $user = UserModel::where('level_id', 1)->first();

// Alternatif untuk mengambil model pertama yang cocok dengan batasan kueri...
// $user = UserModel::firstWhere('level_id', 1);



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
