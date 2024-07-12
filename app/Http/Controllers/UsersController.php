<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function view()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }
}
