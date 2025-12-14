@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/meal-planner.css') }}">
@endpush

@section('body-class', 'meal-planner-page')

@section('content')

<div class="planner-container mb-5" style="padding-top: 150px;">
    
    <div class="vertical-text vt-left">Meal Planner</div>
    <div class="vertical-text vt-right">Meal P  lanner</div>

    <div class="container">
        
        <div class="row g-4 mb-4">
            @php 
                $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
                $meals = ['Breakfast', 'Lunch', 'Dinner'];
            @endphp

            @foreach($days as $day)
            <div class="col-md-6 col-lg-4">
                <div class="meal-card">
                    <h3 class="day-title">{{ $day }}</h3>

                    @foreach($meals as $meal)
                    <div class="meal-row">
                        <div class="meal-label-group">
                            <span class="meal-label">{{ $meal }}</span>
                            <div class="meal-line"></div>
                        </div>

                        @php 
                            $dayKey = strtolower($day);
                            $mealKey = strtolower($meal);
    
                            // Coba ambil pake huruf kecil dulu (prioritas), kalau gak ada coba as-is
                            $currentPlan = $userPlans[$dayKey][$mealKey] ?? $userPlans[$day][$meal] ?? null;
                        @endphp

                        @if($currentPlan)
                            <div class="text-center">
                                <span class="selected-meal-text">{{ $currentPlan->recipe->title }}</span>
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn-change" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#mealModal"
                                        data-day="{{ $day }}" 
                                        data-type="{{ $meal }}">
                                        Change
                                    </button>
                                    <form action="{{ route('meal-planner.destroy') }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <input type="hidden" name="day" value="{{ $day }}">
                                        <input type="hidden" name="meal_type" value="{{ $meal }}">
                                        <button type="submit" class="btn-change text-danger ms-2">Remove</button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <button class="btn-choose" 
                                data-bs-toggle="modal" 
                                data-bs-target="#mealModal"
                                data-day="{{ $day }}" 
                                data-type="{{ $meal }}">
                                Choose Meal
                            </button>
                        @endif
                    </div>
                    @endforeach

                </div>
            </div>
            @endforeach
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="meal-card">
                    <h3 class="day-title">saturday</h3>
                    @foreach($meals as $meal)
                    <div class="meal-row">
                        <div class="meal-label-group">
                            <span class="meal-label">{{ $meal }}</span>
                            <div class="meal-line"></div>
                        </div>
                        
                        @php $currentPlan = $userPlans['saturday'][$meal] ?? null; @endphp

                        @if($currentPlan)
                            <div class="text-center">
                                <span class="selected-meal-text">{{ $currentPlan->recipe->title }}</span>
                                <button class="btn-change" data-bs-toggle="modal" data-bs-target="#mealModal" data-day="saturday" data-type="{{ $meal }}">change</button>
                            </div>
                        @else
                            <button class="btn-choose" data-bs-toggle="modal" data-bs-target="#mealModal" data-day="saturday" data-type="{{ $meal }}">choose meal</button>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-6 col-lg-8">
                <div class="planner-img-wrapper">
                    <img src="{{ asset('img/bawah-2.png') }}" class="planner-img" alt="Meal Time">
                    <div class="planner-img-outline"></div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="mealModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title font-serif">Select a Recipe</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('meal-planner.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="day" id="modalDay">
                    <input type="hidden" name="meal_type" id="modalType">

                    <div class="mb-3">
                        <label class="form-label">Available Recipes</label>
                        <select name="recipe_id" class="form-select" required>
                            <option value="" disabled selected>-- Choose a Recipe --</option>
                            @foreach($allRecipes as $recipe)
                                <option value="{{ $recipe->id }}">
                                    {{ $recipe->title }} ({{ ucfirst($recipe->type) }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark rounded-pill">Save to Plan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Script ini berjalan saat tombol "Choose Meal" diklik
    // Tujuannya untuk memindahkan data 'day' dan 'type' dari tombol ke dalam form Modal
    document.addEventListener('DOMContentLoaded', function () {
        var mealModal = document.getElementById('mealModal');
        mealModal.addEventListener('show.bs.modal', function (event) {
            // Tombol yang memicu modal
            var button = event.relatedTarget;
            
            // Ambil data dari atribut tombol (data-day & data-type)
            var day = button.getAttribute('data-day');
            var type = button.getAttribute('data-type');
            
            // Masukkan ke input hidden di dalam form modal
            document.getElementById('modalDay').value = day;
            document.getElementById('modalType').value = type;
            
            // Ubah judul modal biar keren (Optional)
            var modalTitle = mealModal.querySelector('.modal-title');
            modalTitle.textContent = 'Select ' + type + ' for ' + day;
        });
    });
</script>

@endsection