<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WriterController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('writerprofile', compact('users'));
    }

    public function username(User $users)
    {
        // You now have access to the user instance in the $user variable.
        
        return view('writerprofile', compact('users'));
    }

}