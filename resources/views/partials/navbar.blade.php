<nav class="navbar navbar-expand-lg navbar-dark position-absolute w-100 py-3" style="z-index: 99;">
    <div class="container position-relative">
        
        <button class="navbar-toggler border-0 p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="z-index: 20;">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand absolute-center" href="{{ route('home') }}">
            <img src="{{ asset('img/logo.svg') }}" alt="Nibble Logo" class="navbar-logo-img">
        </a>

        <div class="collapse navbar-collapse mt-3 mt-lg-0" id="navbarNav">
            
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center text-lg-start">
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-white" href="{{ route('about') }}">About</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto gap-lg-5 text-center text-lg-end">
                <li class="nav-item"><a class="nav-link text-uppercase text-white" href="{{ route('forum.index') }}">Forum</a></li>
                <li class="nav-item"><a class="nav-link text-uppercase text-white" href="{{ route('recipe') }}">Discover</a></li>
                
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-uppercase text-white" href="{{ route('login') }}">Login</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-uppercase text-white" href="{{ route('profile') }}">
                            Profile
                        </a>
                    </li>
                @endguest
            </ul>

        </div>
        
    </div>
</nav>