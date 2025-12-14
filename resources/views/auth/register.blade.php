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
        <div class="col-md-6">
            <h2 class="font-serif text-center mb-4">create account</h2>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('register.process') }}" method="POST">
                @csrf <div class="mb-3">
                    <label class="form-label text-muted small">Full Name</label>
                    <input type="text" name="name" class="form-control rounded-0" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted small">Email Address</label>
                    <input type="email" name="email" class="form-control rounded-0" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted small">Password</label>
                    <input type="password" name="password" class="form-control rounded-0" required>
                </div>

                <div class="mb-4">
                    <label class="form-label text-muted small">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control rounded-0" required>
                </div>

                <button type="submit" class="btn btn-dark w-100 rounded-pill py-2">Register</button>
                
                <p class="text-center mt-3 small text-muted">
                    Already have an account? <a href="{{ route('login') }}" class="text-dark">Login</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection