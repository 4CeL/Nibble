@extends('layouts.app')

@section('content')

<section class="hero-section d-flex align-items-center justify-content-center text-center text-white">
    <div class="container position-relative">
        <h1 class="display-3 font-serif fst-italic mb-4">inspire your kitchen.</h1>
        
        <div class="circle-btn-container mt-4">
            <a href="#" class="circle-btn">
                See our<br>recipes.
            </a>
        </div>
    </div>
</section>

<section class="py-5 bg-light-marble">
    <div class="container text-center py-5">
        <h2 class="font-serif mb-5">the world's most popular.<br>condensed into one.</h2>
        
        <div class="row align-items-center justify-content-center">
            <div class="col-md-3 opacity-50">
                <img src="{{ asset('img/food-1.png') }}" class="img-fluid rounded-circle" alt="Dish">
            </div>
            
            <div class="col-md-6 position-relative">
                <div class="plate-background"></div> <img src="{{ asset('img/food-2.png') }}" class="img-fluid rounded-circle position-relative z-2 shadow-lg" alt="Main Dish">
            </div>
            
            <div class="col-md-3 opacity-50">
                <img src="{{ asset('img/food-3.png') }}" class="img-fluid rounded-circle" alt="Dish">
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-4 text-start">
                <span class="display-4 font-serif">02</span><span class="text-muted">/05</span>
            </div>
            <div class="col-md-4">
                <h3 class="font-serif">stir fried beef pasta</h3>
            </div>
            <div class="col-md-4 text-end">
                <span class="fs-2 me-3">&lt;</span> <span class="fs-2">&gt;</span>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-4 align-items-center">
            
            <div class="col-md-5">
                <div class="half-circle-img-container mb-4">
                     <img src="{{ asset('img/bawah-1.png') }}" class="img-fluid half-circle-img" alt="Eating">
                </div>
            </div>

            <div class="col-md-3 text-center">
                <div class="teardrop-img mb-4">
                    <img src="{{ asset('img/sushi.png') }}" class="img-fluid" alt="Sushi">
                </div>
            </div>

            <div class="col-md-4">
                <p class="text-end text-muted small mb-4">testimonies</p>
                <p class="font-serif text-justify fs-6">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lacinia elit at mi lacinia, vitae sagittis lacus pulvinar. Proin at diam nisi. Pellentesque eros mauris.
                </p>
                <p class="mt-3 text-end small">&mdash; Hendy Tandiono, 2025</p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="arch-img-container">
                    <img src="{{ asset('img/bawah-2.png') }}" class="w-100 arch-img" alt="Picnic">
                </div>
            </div>
        </div>
    </div>
</section>

@endsection