<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Tampilkan form login admin.
     */
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    /**
     * Proses login admin.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth('admin')->attempt($credentials, $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => __('Kredensial tidak cocok dengan data kami.'),
            ]);
        }

        $request->session()->regenerate();

        /** @var Admin $admin */
        $admin = Auth('admin')->user();
        $admin->update(['last_login_at' => now()]);

        return redirect()->intended(route(config('admin.redirect_after_login')));
    }

    /**
     * Logout admin.
     */
    public function logout(Request $request)
    {
        Auth('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
