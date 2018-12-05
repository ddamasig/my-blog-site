@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <h1 class="mb-4">Create Post</h1>
            <!-- Alerts Messages -->
            @include('inc.messages')

            {!! Form::open(['action' => 'PostsController@store', 'method' => 'posts']) !!}
                <div class="form-group">
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title', '', ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('body', 'Body') }}
                    {{ Form::textarea('body', '', ['class' => 'form-control']) }}
                </div>
                {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
            {!! Form::close()!!}
        </div>
    </div>
</div>
@endsection