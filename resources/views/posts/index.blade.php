@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <!-- Alert Messages -->
                @include('inc.messages')
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
                            <a href="#">Start Bootstrap</a>
                            on {!! $post->created_at->format('F d, Y') !!}
                        </p>
                    </div>
                    <hr>
                @endforeach
                {!! $postsLinks !!}
            </div>
        </div>
    </div>
@endsection