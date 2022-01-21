<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    public function editUser()
    {

        $user = auth()->user();

        return view('auth.user-edit', compact('user'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'birthday' => 'required|date',
            //'gender' => 'required|string',
            'deaf' => 'required|string',
            //'institution'=> 'nullable|string',
            //'grade'=> 'required|string',
        ]);

        Auth::login($user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'birthday' => $request->birthday,
            //'gender' => $request->gender,
            'deaf' => $request->deaf,
            //'institution' => $request->institution,
            //'grade' => $request->grade,
        ]));

        event(new Registered($user));

        return redirect('index')
        ->with('message', 'Usuário cadastrado com sucesso.');
    }

    public function userUpdate(Request $request)
    {

        if (!$user = auth()->user()) {
            return redirect()->back();
        }

        $data = $request->all();

        $this->validate($request, [
            'avatar' => 'nullable|image',
        ]);

        if ($request->exists('avatar')){
            if ($user->avatar !="user.png"){
                if (Storage::exists($user->avatar))
                    Storage::delete($user->avatar);
            }

            $avatar = $request->avatar->store(path: 'user.avatar', options:'s3');
            $data['avatar'] = $avatar;
            
        }

        $user->update($data);

        return redirect()
            ->route('aula.userList')
            ->with('message', 'Dados editados com sucesso');
    }
}
