<!-- Page Header -->
@if (isset($postCoverImage) && $postCoverImage != 'noimage.jpg')
<header class="masthead" style="background-image: url('/storage/cover_images/{{ $postCoverImage }}')">
    @else
    <header class="masthead" style="background-image: url('{{asset('img/home-bg.jpg')}}')">
        @endif
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 mx-auto">
                    <div class="site-heading">
                        @if (isset($posts))
                        <h1>Lorem Ipsum</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                        @else
                        <h1>{{$post->title}}</h1>
                        {!! strip_tags(explode(".", $post->body, 2)[0]) !!}...
                        <span class="subheading"></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>
