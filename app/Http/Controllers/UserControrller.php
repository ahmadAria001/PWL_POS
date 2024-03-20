<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserControrller extends Controller
{
    public function index()
    {
        $user = UserModel::where('username', 'manager9')->firstOrFail();

        return view('user', ['data' => $user]);
    }
}
