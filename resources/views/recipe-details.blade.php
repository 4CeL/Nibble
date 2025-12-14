@extends('layouts.app')

@section('content')

<style>
    /* 1. Paksa Background Gradient (Timpa Marble) */
    body {
        /* Reset background image lama */
        background-image: none !important;
        background-color: transparent !important;
        
        /* Pasang Gradient Baru */
        background: linear-gradient(135deg, #4f9a8f 0%, #aaddd7 50%, #eef6f6 100%) !important;
        
        background-attachment: fixed !important;
        min-height: 100vh;
    }

    /* 2. Navbar Hitam */
    .navbar-dark .nav-link { color: #000 !important; }
    .navbar-brand img { filter: invert(1); }
    .navbar-toggler { filter: invert(1); border-color: rgba(0,0,0,0.5) !important; }

    /* 3. Style Gambar Utama */
    .detail-img-wrapper {
        position: relative;
        padding: 30px 40px 50px 30px;
    }

    .detail-img {
        width: 100%;
        height: auto;
        aspect-ratio: 1 / 1;
        object-fit: cover;
        border-radius: 30px 150px 30px 30px; /* Lengkung Kanan Atas */
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    /* Garis Putih Dekoratif */
    .detail-img-wrapper::before {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        border: 1px solid rgba(255,255,255, 0.8);
        border-radius: 30px 150px 30px 30px;
        pointer-events: none;
        z-index: 1;
        margin: 30px 40px 50px 30px;
    }

    /* 4. Tags (Pills) */
    .recipe-tag {
        background-color: #76aead;
        color: white;
        padding: 8px 25px;
        border-radius: 50px;
        text-decoration: none;
        font-family: 'Playfair Display', serif;
        font-size: 0.9rem;
        transition: all 0.3s;
    }
    .recipe-tag:hover { background-color: #000; color: #fff; }

    .recipe-tag-plus {
        width: 40px; height: 40px;
        background-color: #76aead; color: white;
        border-radius: 50%;
        display: inline-flex; align-items: center; justify-content: center;
        font-weight: bold;
    }

    /* 5. Typography */
    .detail-title {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        margin-bottom: 2rem;
        color: #1a1a1a;
    }
    .detail-desc {
        font-size: 1rem; line-height: 1.8; color: #333; text-align: justify;
    }

    /* Mobile Responsive */
    @media (max-width: 991px) {
        .detail-title { font-size: 2.5rem; text-align: center; }
        .detail-img { height: 350px; border-radius: 20px 80px 20px 20px; }
        .detail-img-wrapper::before { border-radius: 20px 80px 20px 20px; }
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

<div class="container" style="padding-top: 150px; padding-bottom: 100px;">
    <div class="row align-items-center gx-lg-5">
        
        <div class="col-lg-6 mb-5 mb-lg-0">
            <h1 class="detail-title">{{ $recipe->title }}</h1>
            
            <div class="detail-img-wrapper">
                <img src="{{ asset('img/' . $recipe->image) }}" class="detail-img" alt="{{ $recipe->title }}">
                <span style="position:absolute; top: 40px; left: 40px; color: white; font-size: 24px;">✦</span>
                <span style="position:absolute; bottom: 40px; right: 40px; color: white; font-size: 24px;">✦</span>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="detail-desc">
                <p class="mb-4">{{ $recipe->desc }}</p>
                <h5 class="font-serif mb-3">Ingredients:</h5>
                <ul class="mb-4" style="list-style-position: inside;">
                    @foreach(explode(',', $recipe->ingredients) as $ingredient)
                        <li>{{ trim($ingredient) }}</li>
                    @endforeach
                </ul>

                <h5 class="font-serif mb-3">Instructions:</h5>
                <ol class="mb-5 ps-3" style="line-height: 1.8;">
                    @foreach(explode('|', $recipe->instructions) as $step)
                        <li class="mb-2">{{ trim($step) }}</li>
                    @endforeach
                </ol>

                <div class="d-flex gap-3 align-items-center flex-wrap">
                    <a href="#" class="recipe-tag">
                        {{ $recipe->type }}
                    </a>
                    <a href="#" class="recipe-tag">healthy</a>
                    <div class="recipe-tag-plus">+</div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection