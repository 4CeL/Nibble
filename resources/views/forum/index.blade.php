@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/forum.css') }}">
@endpush

@section('body-class', 'forum-page')

@section('content')


<div class="container" style="padding-top: 140px; padding-bottom: 100px;">
    <div class="row">
        
        <div class="col-md-3">
            
            <div class="sidebar-card">
                <h5 class="font-serif mb-1">recommended</h5>
                <p class="text-muted small mb-0">for you</p>
                <hr>
                <h6 class="font-serif mb-1">followed tags</h6>
                <p class="text-muted small">vegan, protein, etc.</p>
            </div>

            <div class="sidebar-card">
                <h5 class="font-serif mb-3">popular tags</h5>
                
                <a href="{{ route('forum.index') }}" class="tag-item {{ !request('tag') ? 'active' : '' }}">
                    <span>All Posts</span>
                </a>

                @foreach($tags as $tag)
                <a href="{{ route('forum.index', ['tag' => $tag->slug]) }}" class="tag-item {{ request('tag') == $tag->slug ? 'active' : '' }}">
                    <span>{{ $tag->name }}</span>
                    <span>{{ request('tag') == $tag->slug ? '✓' : '+' }}</span>
                </a>
                @endforeach
            </div>

        </div>

        <div class="col-md-9">
            
            <div class="create-post-wrapper">
                <form action="{{ route('forum.store') }}" method="POST">
                    @csrf
                    <div class="create-post-header">
                        <span>wanna say something, {{ Auth::user()->name }}?</span>
                        
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-light rounded-pill dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                add tags +
                            </button>
                            <div class="dropdown-menu p-2">
                                @foreach($tags as $tag)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag{{$tag->id}}">
                                    <label class="form-check-label text-dark" for="tag{{$tag->id}}">
                                        {{ $tag->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <div class="create-post-body d-flex flex-column">
                        <textarea name="content" class="create-post-textarea" rows="2" placeholder="Write here..."></textarea>
                        <button type="submit" class="btn btn-dark rounded-circle align-self-end mt-2 me-2 mb-2 shadow-sm" style="width: 40px; height: 40px;">
                            ➤
                        </button>
                    </div>
                </form>
            </div>

            @foreach($posts as $post)
            <div class="post-card">
                
                <div class="post-header">
                    <span>post by {{ strtolower(explode(' ', $post->user->name)[0]) }}</span>
                    @foreach($post->tags as $postTag)
                        <span class="post-tag-badge">{{ $postTag->name }}</span>
                    @endforeach
                </div>

                <div class="post-bubble">
                    {{ $post->content }}
                </div>

                <div class="d-flex justify-content-end align-items-center gap-3">
                    
                    <button class="action-btn" type="button" data-bs-toggle="collapse" data-bs-target="#comments-{{ $post->id }}">
                        💬 {{ $post->comments->count() }}
                    </button>

                    <form action="{{ route('forum.like', $post->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="action-btn {{ $post->isLikedByAuthUser() ? 'liked' : '' }}">
                            ♥ {{ $post->likes->count() }}
                        </button>
                    </form>

                </div>

                <div class="collapse" id="comments-{{ $post->id }}">
                    <div class="comment-section">
                        @foreach($post->comments as $comment)
                        <div class="comment-bubble">
                            <strong>{{ $comment->user->name }}:</strong> {{ $comment->body }}
                        </div>
                        @endforeach

                        <form action="{{ route('forum.comment', $post->id) }}" method="POST" class="mt-3 d-flex gap-2">
                            @csrf
                            <input type="text" name="body" class="form-control rounded-pill py-2 px-3" placeholder="Write a comment...">
                            <button type="submit" class="btn btn-light rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 45px; height: 45px; min-width: 45px;">
                                ➤ </button>
                        </form>
                    </div>
                </div>

            </div>
            @endforeach

            <div class="d-flex justify-content-center mt-5">
                {{ $posts->links() }}
            </div>

        </div>
    </div>
</div>

@endsection