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
                        <th style="width:80%;"><span class="btn">Title</span></th>
                        <th style="width:10%;"></th>
                        <th style="width:10%;">
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
                        <td style="width:80%;" class="align-middle">
                            {{ $post->title }}
                        </td>
                        <td style="width:10%;">
                            <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary float-right">
                                <li class="fa fa-edit mr-2"></li>
                                Edit
                            </a>
                        </td>
                        <td style="width:10%;">
                        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) !!}
                            {{ Form::hidden('_method', 'DELETE') }}
                            <button class="btn btn-danger float-right">
                                <li class="fa fa-trash mr-2"></li> Delete
                            </button>
                        {!! Form::close() !!}
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
