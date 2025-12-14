@extends('layouts.app')

@section('content')

<style>
    .navbar-dark .nav-link {
        color: #000 !important;
    }
    .navbar-brand img {
        filter: invert(1);
    }
    
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
        
        /* Ubah Teks Menu Jadi PUTIH saat di HP */
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

<section class="pb-5 mb-5" style="padding-top: 125px;">
    <div class="container">
        <div class="row align-items-center">
            
            <div class="col-md-6 position-relative mb-5 mb-md-0">
                <div class="about-image-wrapper mx-auto">
                    
                    <div class="green-shape-bg d-flex align-items-end justify-content-center">
                        <img src="{{ asset('img/food-2.png') }}" class="img-fluid rounded-circle img-pasta" alt="Pasta">
                        <div class="star-decoration">✦</div>
                    </div>

                    <img src="{{ asset('img/food-3.png') }}" class="img-fluid rounded-circle shadow-lg img-salad-float" alt="Salad">
                    
                </div>
            </div>

            <div class="col-md-6 ps-md-5">
                <h1 class="display-4 font-serif mb-4">healthy recipes.</h1>
                
                <div class="text-muted" style="line-height: 1.8; text-align: justify;">
                    <p class="mb-4">
                        Nibble adalah platform resep masakan yang membantu pengguna menemukan, membagikan, 
                        dan memasak berbagai hidangan dengan cara yang mudah dan menyenangkan. Selain 
                        menawarkan pencarian resep dan rekomendasi berdasarkan bahan yang tersedia, Nibble juga 
                        mendorong pemanfaatan bahan sisa agar tidak terbuang percuma, sehingga mendukung SDG 
                        2 (Zero Hunger) dengan mengurangi kelaparan melalui ide pengolahan makanan, serta SDG 12 
                        (Responsible Consumption and Production) dengan mengajak pengguna untuk lebih bijak 
                        dalam mengonsumsi dan mengurangi limbah makanan.
                    </p>
                    <p>
                        Dengan begitu, memasak bersama Nibble bukan hanya praktis, tetapi juga berkontribusi pada 
                        dunia yang lebih berkelanjutan. Melalui forum komunitasnya, pengguna dapat saling bertukar 
                        resep, tips, dan inspirasi untuk menciptakan dapur yang lebih sehat dan ramah lingkungan.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection