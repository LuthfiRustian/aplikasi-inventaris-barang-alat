<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers {
        register as registration;
    }

    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest');
    }

    // Validasi input
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user,email'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    }

    // Simpan data user tanpa hash password
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'], // ❌ tanpa hash
        ]);
    }

    // Supaya setelah daftar tidak langsung login
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $this->create($request->all());

        return redirect()->route('login.form')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
