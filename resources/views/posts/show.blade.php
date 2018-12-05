@extends('layouts.app')

@section('content')

<!-- Page Header -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>{!! $post->body !!}</p>

                <small class="post-meta mb-5 d-block">Posted by
                    <a href="#">{{ $post->user->name }}</a>
                    on {!! $post->created_at->format('F d, Y') !!}
                </small>
            </div>
        </div>
    </div>
</article>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-5">
            <a class="btn btn-secondary" href="/posts">
                <i class="fa fa-arrow-left mr-2"></i>
                Go Back
            </a>
        </div>

        <div class="col-lg-4 col-md-5 text-right">
            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) !!}
                <a class="btn btn-info" href="/posts/{{ $post->id }}/edit">
                    <i class="fa fa-edit mr-2"></i>
                    Edit
                </a>
                {{ Form::hidden('_method', 'DELETE') }}
                {{-- {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }} --}}
                <button class="btn btn-danger"><li class="fa fa-trash mr-2"></li> Delete</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
