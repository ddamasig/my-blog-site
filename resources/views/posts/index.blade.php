@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <!-- Alert Messages -->
                @include('inc.messages')

                @if (count($posts) > 0)
                    @foreach ($posts as $post)
                        <div class="post-preview">
                            <a href="/posts/{{$post->id}}">
                                <h2 class="post-title">
                                    {{$post->title}}
                                </h2>
                                <h3 class="post-subtitle">
                                    {!! strip_tags(explode(".", $post->body, 2)[0]) !!}...
                                </h3>
                            </a>
                            <p class="post-meta">Posted by
                                <a href="#">{{ $post->user->name }}</a>
                                on {!! $post->created_at->format('F d, Y') !!}
                            </p>
                        </div>
                        <hr>
                    @endforeach
                    
                @else
                    <h2 class="mb-2 text-center">No post found :(</h2>
                    <h6 class="mb-5 text-center">
                        <a href="/posts/create" class="text-info">
                            Click here to write one.
                        </a>
                    </h6>
                @endif
                {!! $postsLinks !!}
            </div>
        </div>
    </div>
@endsection