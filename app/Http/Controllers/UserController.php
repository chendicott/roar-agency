<?php

namespace App\Http\Controllers;

use App\Models\Invite;
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

    public function activate(string $guid) {
        if (request()->method() === "GET") {
            if (!request()->hasValidSignature()) {
                session()->flush();
                abort(401);
            }

            session()->flash('signature_valid', true);
        }


        // Find user based on activation guid
        $invite = Invite::where('invite_guid', $guid)->firstOrFail();
        $user = $invite->user;

        if (!$user) {
            abort(404);
        }

        if (request()->method() === 'POST') {
            if (session()->has('signature_valid')) {
                session()->forget('signature_valid');
            } else {
                abort(401);
            }

            $this->validate(request(), [
                'password' => 'required|string|min:8|confirmed'
            ]);

            $user->password = bcrypt(request()->password);
            $user->is_active = true;

            $user->save();
            $invite->delete();


            return redirect('login')->with('status', 'Your account has been successfully activated!');
        }

        return view('auth.activate', ['user' => $user]);
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
