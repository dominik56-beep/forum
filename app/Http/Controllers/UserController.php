<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function get(int $id)
    {
        $user = User::find($id);

        return view('profile', ['user' => $user]);
    }
}
