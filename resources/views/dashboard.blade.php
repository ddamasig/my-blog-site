@extends('layouts.app-no-page-header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <h1 class="mb-4">Your Blog Posts</h1>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><span class="btn">Title</span></th>
                        <th></th>
                        <th>
                            <a href="/posts/create" class="btn btn-default float-right">
                                <li class="fa fa-plus mr-2"></li>
                                Write New Post
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($posts) > 0)
                    @foreach ($posts as $post)
                    <tr>
                        <td class="align-middle">{{ $post->title }}</td>
                        <td colspan="2">
                            <div class="float-right">
                                {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) !!}
                                    <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">
                                        <li class="fa fa-edit mr-2"></li>
                                        Edit
                                    </a>
                                {{ Form::hidden('_method', 'DELETE') }}
                                    {{-- {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }} --}}
                                    <button class="btn btn-danger">
                                        <li class="fa fa-trash mr-2"></li> Delete
                                    </button>
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="3">
                            <h5 class="text-center">No Posts Found :(</h5>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <!-- Alerts Messages -->
            @include('inc.messages')
        </div>
    </div>
    @endsection
