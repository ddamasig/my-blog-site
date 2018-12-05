@extends('layouts.app')

@section('content')

<!-- Page Header -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>{!! $post->body !!}</p>
            </div>
        </div>
    </div>
</article>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <a class="btn btn-secondary" href="/posts">
                <i class="fa fa-arrow-left mr-2"></i>
                Go Back
            </a>
        </div>
    </div>
</div>
@endsection
