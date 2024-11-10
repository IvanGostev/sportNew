<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function show(User $user)
    {
        return view('show', compact('user'));
    }

    public function terms() {
        return view('terms');
    }
}
