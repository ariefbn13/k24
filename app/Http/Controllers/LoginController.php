<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }
    public function loginAdmin()
    {
        return view('loginAdmin', [
            'title' => 'Login Admin',
            'active' => 'loginAdmin'
        ]);
    }
    
    public function authenticateAdmin(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        // dd($credentials);

        $attempt = Auth::guard('admin')->attempt($credentials);
       
        if ($attempt){
            $request->session()->regenerate();
            toastr()->success('Registrasi berhasil');
            return redirect('/homeAdmin');
        }
        return back()->with('loginError', 'Login Failed!');   
    }

    public function homeAdmin()
    {
        $users = User::all();
        return view('homeAdmin', [
            'title' => 'Home Admin',
            'active' => 'homeAdmin',
            'users' => $users,
        ]);
    }

    public function logout(Request $request){

        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');

    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'username' => ['required', 'email'],
        'password' => ['required'],
    ]);

    $credentials['email'] = $credentials['username'];
    unset($credentials['username']);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Redirect ke halaman detail member dengan parameter ID user
        return redirect()->route('view-member', Auth::id());
    }

    return back()->withErrors([
        'username' => 'Email atau kata sandi yang Anda masukkan salah.',
    ]);
}
}
