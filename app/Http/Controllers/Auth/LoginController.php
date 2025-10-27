<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login', [
            'url' => route('admin.login'),
            'title' => 'Admin',
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'user' => 'required|string',
            'password' => 'required|string',
        ]);

        $field = strlen($request->user) === 11 ? 'mobile_no' : 'email';
        $credentials = [$field => $request->user, 'password' => $request->password];

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $user = Auth::user();
            if ($user->status == 1) {
                return redirect()->route('dashboard');
            }

            Auth::logout();
            return back()->with('login_error', 'Your account is not active. Please contact support.');
        }

        return back()->with('login_error', 'Your user information or password is incorrect.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function loginAsViewer()
    {
        $email = env('VIEWER_EMAIL', 'viewer@gmail.com');
        $password = env('VIEWER_PASSWORD', '12345');

        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user);

            if ($user->status == 1) {
                return redirect()->route('dashboard');
            }

            Auth::logout();
            return back()->with('login_error', 'Your account is not active. Please contact support.');
        }

        return back()->with('login_error', 'Failed to log in as viewer.');
    }
}
