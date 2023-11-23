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
            $user = request();
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

    public function camelCaseToFriendlyName($input) {
        // First, split the string into individual words based on uppercase letters
        $words = preg_split('/(?=[A-Z])/', $input, -1, PREG_SPLIT_NO_EMPTY);

        // Then, join the words with a space and capitalize the first letter of each word
        $friendlyName = implode(' ', $words);
        $friendlyName = ucwords($friendlyName);

        return $friendlyName;
    }
}
