<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // --- REGISTER ---
    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        // 1. Validasi Input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', 
        ]);

        // 2. Simpan ke Database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);

        // 3. Auto Login setelah register (Opsional)
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // --- LOGIN ---
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        // 1. Validasi
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Cek Autentikasi
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Keamanan Session Fixation
            return redirect()->route('home'); // Redirect ke halaman profil
        }

        // 3. Jika Gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // --- LOGOUT ---
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    
    // --- PROFILE ---
    public function profile() {
        return view('profile.index');
    }

    public function updateProfile(Request $request)
    {
    // 1. Validasi Input
        $request->validate([
            'name'  => 'required|string|max:255',
            'bio'   => 'nullable|string|max:500',
            'age'   => 'nullable|integer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        $user = Auth::user();
    
    // 2. Update Text Data
        $user->name = $request->name;
        $user->bio  = $request->bio;
        $user->age  = $request->age;

    // 3. Handle Upload Foto
        if ($request->hasFile('photo')) {
        // Hapus foto lama jika ada (dan bukan foto default)
            if ($user->photo && Storage::disk('public')->exists($user->photo)) {
                Storage::disk('public')->delete($user->photo);
            }
            $path = $request->file('photo')->store('profile_photos', 'public');
        
        // Simpan path ke database
            $user->photo = $path;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    // 1. Redirect User ke Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // 2. Google Mengembalikan Data User
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Cek apakah user ini sudah ada di database berdasarkan Email
            $finduser = User::where('email', $googleUser->getEmail())->first();

            if($finduser){
                // Jika user sudah ada, langsung login
                Auth::login($finduser);
                
                // Update google_id jika belum ada (misal dulunya daftar manual)
                if (!$finduser->google_id) {
                    $finduser->google_id = $googleUser->getId();
                    $finduser->save();
                }
                
                return redirect()->route('home');
            } else {
                // Jika belum ada, buat user baru
                $newUser = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id'=> $googleUser->getId(),
                    'password' => Hash::make(Str::random(16)), 
                    'photo' => $googleUser->getAvatar(), 
                    'bio' => 'New member from Google',
                    'age' => 20
                ]);

                Auth::login($newUser);
                return redirect()->route('home');
            }
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Login Google gagal, coba lagi.');
        }
    }
}