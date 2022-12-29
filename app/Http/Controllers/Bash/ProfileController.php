<?php

namespace App\Http\Controllers\Bash;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash};

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('bash.profile.show', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate(
            [
                'name'                  => 'required',
                'email'                 => 'bail|required|email|unique:users,email,'.$user->id,
            ],
            [
                'name.required'         => 'Нужно ввести имя пользователя',
                'email.unique'          => 'Пользователь с такой почтой уже существует',
                'email.required'        => 'Нужно ввести email пользователя',
                'email.email'           => 'Email должен быть вида email@email.com',
        ]);
        $input = $request->only('name', 'email', 'phone', 'work');
        $row = User::findOrfail($user->id);
        $row->update($input);

        return back()->with('status_update', 'Информация успешно обновлена');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password'     => ['required', new MatchOldPassword],
            'new_password'         => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return back()->with('status_password', 'Пароль успешно обновлен');
    }
}
