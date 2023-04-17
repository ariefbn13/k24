<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{   
    public function delete($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            toastr()->success('Member berhasil dihapus');
            return redirect('/homeAdmin');
        } else {
            toastr()->error('Member tidak ditemukan');
            return redirect('/homeAdmin');
        }
    }
    
    public function index()
    {
        return view('register', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function reg()
    {
        return view('register', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function register(Request $request)
    {
        // dd($request->all());
        // dd('test');
        $validate_data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'password' => ['required', 'string', 'min:2', 'max:255'],
        'no_hp' => ['required', 'string', 'max:20'],
        'tanggal_lahir' => ['required', 'date'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'jenis_kelamin' => ['required', 'string', 'max:1'],
        'no_ktp' => ['required', 'string', 'max:20'],
        'foto_diri' => ['required', 'file', 'image', 'max:1024'], 
        ]);
    $validate_data['password'] = bcrypt($validate_data['password']);
    
    
    $foto_diri = $request->file('foto_diri')->store('public/foto_diri');

    // Menambahkan path file foto ke array data validasi
    $validate_data['foto_diri'] = $foto_diri;

    //dd($validate_data);

    User::create($validate_data);
    toastr()->success('Registrasi berhasil');
  

    if (Auth::guard('admin')->check()) {
            return redirect('/homeAdmin');
        } else {
            return redirect('/');
        }
    
    }

    public function detail($id)
    {
        $user = User::findOrFail($id);
        return view('member_detail', [
            'title' => 'Detail Member',
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('edit_member', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validate_data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'no_hp' => ['required', 'string', 'max:20'],
            'tanggal_lahir' => ['required', 'date'],
            'jenis_kelamin' => ['required', 'string', 'max:1'],
            'no_ktp' => ['required', 'string', 'max:20'],
            'foto_diri' => ['nullable', 'file', 'image', 'max:1024'],
        ]);

        if ($request->hasFile('foto_diri')) {
            $foto_diri = $request->file('foto_diri')->store('public/foto_diri');
            $validate_data['foto_diri'] = $foto_diri;
        }

        $user->update($validate_data);

        if (Auth::guard('admin')->check()) {
            toastr()->success('Data member berhasil diperbarui');
            return redirect('/homeAdmin');
        } else {
            
        toastr()->success('Data member berhasil diperbarui');
        return redirect()->route('view-member', Auth::id());
            
        }
    
    }



    

}
