@extends('layouts.app')

@section('content')

<!-- HERO SECTION -->
<section class="hero-section d-flex align-items-center justify-content-center text-center text-white" style="background-image: url('{{ asset('img/home-bg.svg') }}'); height: 100vh; background-size: cover;">
    <div class="container">
        <h1 class="display-3 font-serif mb-4">inspire your kitchen.</h1>
        <div class="circle-btn-wrapper">
            <!-- Link ke section recipes -->
            <a href="{{ route('recipe') }}" class="btn btn-outline-light rounded-circle p-4 font-serif fst-italic">
                See our <br> recipes.
            </a>
        </div>
    </div>
</section>

<!-- RECIPES SECTION -->
<section id="recipes" class="py-5">
    <div class="container text-center">
        <h2 class="font-serif mb-5">the world's most popular.<br>condensed into one.</h2>
        
        <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($recipes as $index => $recipe)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-6">
                            <img src="{{ asset('img/' . $recipe['image']) }}" class="rounded-circle img-fluid shadow-lg" style="width: 350px; height: 350px; object-fit: cover;" alt="{{ $recipe['title'] }}">
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="display-4 font-serif">0{{ $index + 1 }}</span>
                        <span class="text-muted h4">/ 05</span>
                        <h3 class="font-serif mt-2">{{ $recipe['title'] }}</h3>
                    </div>
                </div>
                @endforeach
            </div>
            
            <button class="carousel-control-prev text-dark" type="button" data-bs-target="#recipeCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next text-dark" type="button" data-bs-target="#recipeCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
            </button>
        </div>
    </div>
</section>

<!-- GRID & TESTIMONIAL SECTION (DATABASE) -->
<section class="py-5 position-relative mb-5" style="overflow: visible; background-color: transparent !important;">
    <div class="container">
        
        <div class="row align-items-stretch gy-5"> 
            
            <!-- GAMBAR KIRI-->
            <div class="col-md-6 position-relative">
                <img src="{{ asset('img/group-1.png') }}" class="img-fluid shape-circle-cut" alt="Salad">
                <div class="border-outline-circle"></div> 
            </div>

            <!-- KOLOM KANAN -->
            <div class="col-md-6 ps-md-5 d-flex flex-column">
                
                <!-- TESTIMONI CAROUSEL -->
                <div class="mb-4 text-end">
                    <h6 class="text-uppercase mb-3 fw-bold ls-2">Testimonies</h6>
                    
                    <div id="testimonialCarousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($testimonials as $key => $testi)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <div class="pb-3">
                                    <p class="font-serif fs-5 fst-italic">
                                        "{{ $testi->text }}"
                                    </p>
                                    <small class="text-muted d-block mt-3">
                                        — {{ $testi->name }}, {{ $testi->year }}
                                    </small>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-2">
                            <button class="btn btn-sm btn-outline-dark rounded-circle d-flex align-items-center justify-content-center" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev" style="width: 35px; height: 35px;">
                                &lt; </button>
                            <button class="btn btn-sm btn-outline-dark rounded-circle d-flex align-items-center justify-content-center" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next" style="width: 35px; height: 35px;">
                                &gt; </button>
                        </div>
                    </div>
                </div>

                <!-- GAMBAR BAWAH (PIKNIK) -->
                <div class="mt-auto">
                     <img src="{{ asset('img/group-3.png') }}" class="shape-arch-small" alt="Picnic">
                </div>

            </div>
        </div>
        
    </div>
</section>
@endsection