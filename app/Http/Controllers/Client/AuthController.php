<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Schedule;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login (Request $request)
    {
         $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->back()->with('success', 'Đăng nhập thành công');
        }
        return back()->withErrors([
            'error' => 'Email hoặc mật khẩu không đúng',
        ]);
    }
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'enter_password' => 'required|same:password',
        ]);
        $user = User::where('email', $request->email)->first();
        $role_id = Role::where('role', 'Customer')->first()->id;
        if(!$user){
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role_id' => $role_id,
            ]);
        }
        else{
            return back()->withErrors([
                'error' => 'Email này đã được đăng kí',
            ]);
        }
        return redirect()->back()->with('success', 'Đăng kí tài khoản thành công');
    }
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function profile()
    {
        $user = User::find(auth()->user()->id);
        $tickets = Ticket::where('user_id', $user->id)->get();
        return view('client.profile', compact('tickets'));
    }

    public function updateProfile(Request $request){
        $user = User::find(auth()->user()->id);
        if($request->has('password', 'password_new', 'enter_password_new')){
            if(Hash::check($request->password, auth()->user()->password)){
                $request->validate([
                    'password_new' => 'required',
                    'enter_password_new' => 'required|same:password_new',
                ]);
                $user->password = bcrypt($request->password_new);
            }else{
                return back()->withErrors([
                    'error' => 'Mật khẩu hiện tại không đúng',
                ]);
            }
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.auth()->user()->id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'phone'=>   'numeric|digits_between:10,11|nullable',
        ]);

        if($request->has('avatar')){
            $avatarName = time() . '.' . $request->avatar->extension();
            $request->avatar->storeAs('public/avatars', $avatarName);
            $user->avatar = $avatarName;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        return redirect()->back()->with('success', 'Cập nhật thông tin thành công');
    }
}
