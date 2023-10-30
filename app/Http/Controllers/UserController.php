<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users', ['users' => $users]);
    }

    public function create() {

        if (request()->isMethod('post')) {

            $this->validate(request(), [
                'name' => 'required|string|min:3',
                'email' => 'required|email|min:3',
            ]);


            $user = new User();
            $user->name = request()->name;
            $user->email = request()->email;
            $user->type = request()->admin ? 'admin' : 'user';
            $user->password = bcrypt(Str::random(10));
            $userSuccess = $user->save();

            if ($userSuccess) {
                return redirect('/admin/profile/' . $user->id);
            }

        }

        return view('admin.user');
    }
}
