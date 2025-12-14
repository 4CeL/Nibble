@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush

@section('content')

<div class="container" style="padding-top: 150px; padding-bottom: 100px;">
    
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="display-5 profile-header">
                welcome, {{ explode(' ', Auth::user()->name)[0] }}.
            </h1>
        </div>
    </div>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                
                <div class="mb-4 text-white">
                    <label class="small text-white-50 mb-1">Full Name</label>
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square me-3" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        <input type="text" name="name" class="input-name" value="{{ Auth::user()->name }}">
                    </div>
                </div>

                <p class="text-white mb-2">Bio</p>
                <div class="position-relative">
                    <textarea name="bio" class="bio-box" placeholder="Write something about yourself...">{{ Auth::user()->bio }}</textarea>
                </div>

                <div class="d-flex gap-3 align-items-center mt-3">
                    
                    <button type="submit" class="btn btn-save">Save Changes</button>

                    <button type="button" class="btn btn-logout" onclick="document.getElementById('logout-form').submit();">
                        Logout
                    </button>

                </div>

            </div>

            <div class="col-md-6">
                <div class="profile-img-wrapper">
                    
                    <img id="preview-image" 
                        src="{{ 
                            Auth::user()->photo 
                                ? (Str::startsWith(Auth::user()->photo, 'http') ? Auth::user()->photo : asset('storage/' . Auth::user()->photo)) 
                                : asset('img/profile-user.jpg') 
                        }}" 
                        class="profile-img shadow-lg" 
                        alt="Profile Picture">
                    
                    <div class="profile-img-outline"></div>

                    <label for="upload-photo" style="position: absolute; bottom: 30px; right: 30px; cursor: pointer; z-index: 10;">
                        <span class="text-white bg-dark p-2 rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; opacity: 0.8;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
                                <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
                                <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                            </svg>
                        </span>
                        
                        <input type="file" name="photo" id="upload-photo" class="d-none" onchange="previewImage(event)">
                    </label>

                </div>
            </div>
        </div>
    </form> <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('preview-image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection