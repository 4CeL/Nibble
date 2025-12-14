@extends('layouts.app')

@section('content')
<style>
    /* 1. STATE DEFAULT (DESKTOP): Background Putih, Teks Hitam */
    .navbar-dark .nav-link {
        color: #000 !important; /* Paksa Hitam di Desktop */
    }
    .navbar-brand img {
        filter: invert(1); /* Logo jadi Hitam */
    }
    
    /* Tombol Burger jadi Hitam */
    .navbar-toggler {
        filter: invert(1);
        border-color: rgba(0,0,0,0.5) !important;
    }

    /* Reset Body */
    body {
        padding-top: 0 !important; 
        background-image: none !important;
        background-color: #fff !important;
    }

    /* ========================================= */
    /* 2. STATE MOBILE (HP): Background Hitam, Teks Putih */
    /* ========================================= */
    @media (max-width: 991px) {
        
        /* A. Ubah Teks Menu Jadi PUTIH saat di HP */
        /* Kita pakai selector yang sama biar menimpa yang diatas */
        .navbar-dark .nav-link {
            color: #ffffff !important; /* UBAH JADI PUTIH */
            border-bottom: 1px solid rgba(255,255,255,0.1); /* Garis pemisah */
            padding: 10px 0;
            text-align: center;
        }

        /* B. Efek Hover di HP */
        .navbar-dark .nav-link:hover {
            color: #f8c146 !important;
        }

        /* C. Background Menu Dropdown Hitam */
        .navbar-collapse {
            background-color: rgba(0, 0, 0, 0.95); /* Hitam Pekat */
            padding: 20px;
            border-radius: 10px;
            margin-top: 15px;
        }
    }
</style>

<div class="container pb-5 mb-5" style="padding-top: 150px;">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h2 class="font-serif text-center mb-4">welcome back</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('login.process') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label text-muted small">Email Address</label>
                    <input type="email" name="email" class="form-control rounded-0" required>
                </div>

                <div class="mb-4">
                    <label class="form-label text-muted small">Password</label>
                    <input type="password" name="password" class="form-control rounded-0" required>
                </div>

                <button type="submit" class="btn btn-dark w-100 rounded-pill py-2">Login</button>
                <div class="text-center my-3 text-muted small">OR</div>

                <a href="{{ route('google.login') }}" class="btn btn-outline-dark w-100 rounded-pill py-2 d-flex align-items-center justify-content-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                        <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352-2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                    </svg>
                    Sign in with Google
                </a>
                
                <p class="text-center mt-3 small text-muted">
                    Don't have an account? <a href="{{ route('register') }}" class="text-dark">Register</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection