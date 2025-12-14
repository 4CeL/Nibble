@extends('layouts.app')

@section('content')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/recipes.css') }}">
@endpush

<div class="container mb-5" style="padding-top: 90px;">
    
    <div class="d-flex justify-content-between align-items-center recipe-header">
        <h1 class="font-serif fw-bold m-0 display-6">recipes</h1>
        <div class="d-flex align-items-center">
            <a href="{{ route('meal-planner') }}" class="text-dark text-decoration-none font-serif fw-bold fs-4 me-2">plan your meals</a>
            <span class="fs-4">&gt;</span>
        </div>
        <span class="star-icon" style="top: -19px; left: 0;">✦</span>
    </div>

    <div class="text-center mb-5">
        <h2 class="font-serif mb-5 display-6">vegan</h2>
        
        <div class="row gy-5">
            @foreach($vegans as $recipe)
            <div class="col-md-4 d-flex flex-column align-items-center">
                <div class="position-relative mb-4">
                    @if($loop->iteration == 2)
                        <img src="{{ asset('img/' . $recipe->image) }}" class="img-recipe-unique shadow-sm" alt="{{ $recipe->title }}">
                        <span class="star-icon text-white" style="top: 10px; left: 10px;">✦</span>
                        <span class="star-icon text-white" style="bottom: 10px; right: 10px;">✦</span>
                    @else
                        <img src="{{ asset('img/' . $recipe->image) }}" class="img-recipe-circle shadow-sm" alt="{{ $recipe->title }}">
                    @endif
                </div>

                <h3 class="font-serif h2 mb-3">{{ $recipe->title }}</h3>
                <p class="text-muted small px-4 mb-4" style="max-width: 350px;">
                    {{ $recipe->desc }}
                </p>
                <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-outline-dark rounded-pill px-5 py-2">details</a>
            </div>
            @endforeach
        </div>
    </div>

    <div class="text-center py-5">
        <h2 class="font-serif mb-5 display-6">protein</h2>
        
        <div class="row gy-5">
            @foreach($proteins as $recipe)
            <div class="col-md-4 d-flex flex-column align-items-center">
                <div class="position-relative mb-4">
                    @if($loop->iteration == 2)
                        <img src="{{ asset('img/' . $recipe->image) }}" class="img-recipe-unique shadow-sm" alt="{{ $recipe->title }}">
                        <span class="star-icon text-white" style="top: 10px; left: 10px;">✦</span>
                    @else
                        <img src="{{ asset('img/' . $recipe->image) }}" class="img-recipe-circle shadow-sm" alt="{{ $recipe->title }}">
                    @endif
                </div>

                <h3 class="font-serif h2 mb-3">{{ $recipe->title }}</h3>
                <p class="text-muted small px-4 mb-4" style="max-width: 350px;">
                    {{ $recipe->desc }}
                </p>
                <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-outline-dark rounded-pill px-5 py-2">details</a>
            </div>
            @endforeach
        </div>
    </div>

</div>

<div class="container-fluid border-top border-dark mt-5 position-relative">
    <span class="star-icon" style="top: -19px; right: 20px;">✦</span>
</div>

@endsection