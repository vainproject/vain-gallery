@extends('gallery::layout')

@section('title')
    @lang('gallery::album.title.index')
@stop

@section('headline')
    <h1 class="text-uppercase">@lang('gallery::album.title.index')</h1>
    <h2>@lang('gallery::album.title.teaser')</h2>
@endsection

@section('content')
    <div id="gallery">
        <div class="grid">
            @foreach($albums as $album)
                <div class="grid-item album-item">
                    <a href="{{ route('gallery.album.show', $album->slug) }}">
                        <img class="img-responsive" src="{{ $album->cover_image_url }}">
                        <p class="lead">{{ $album->content->title }}</p>
                    </a>
                    <p>{{ $album->content->description }}</p>
                    <hr>
                </div>
            @endforeach
        </div>
        <div>{!! $albums->render() !!}</div>
    </div>
@endsection