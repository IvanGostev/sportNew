<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class UserAdminController extends Controller
{

    public function index(Request $request)
    {
        $users = User::query();
        $data = $request->all();

        if (isset($data['email']) and $data['email'] == true) {
            $users->where('email', 'LIKE', "%{$data['email']}%");
        }
        if (isset($data['phone']) and $data['phone'] == true) {
            $users->where('phone', 'LIKE', "%{$data['phone']}%");
        }
        if (isset($data['name']) and $data['name'] == true) {
            $users->where('name', 'LIKE', "%{$data['name']}%");
        }
        if (isset($data['last_name']) and $data['last_name'] == true) {
            $users->where('last_name', 'LIKE', "%{$data['last_name']}%");
        }
        $users = $users->latest()->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    function destroy(User $user) {
        $user->delete();
        return back();
    }

}
