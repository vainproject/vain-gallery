@extends('gallery::layout')

@section('title')
    {{ $album->content->title }}
@stop

@section('headline')
    <h1 class="text-uppercase">{{ $album->content->title }}</h1>
    <h2>{{ $album->content->text }}</h2>
@endsection

@section('content')
    <div id="gallery">
        <div class="row">
            <div class="col-md-7">
                {{-- Image Grid --}}
                <div class="row">
                    @foreach($album->images as $image)
                        <div class="col-md-5 image-item">
                            <a href="{{ $image->public_url }}" title="{{ $image->content->title }}" data-gallery>
                                <img class="img-responsive" src="{{ $image->public_url }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                {{-- Album information --}}
                <h1>{{ $album->content->title }}</h1>
                <hr>
                <p>{{ $album->content->text }}</p>
            </div>
        </div>

        {{-- The Gallery as lightbox dialog, should be a child element of the document body --}}
        <div id="blueimp-gallery" class="blueimp-gallery">
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <ol class="indicator"></ol>
        </div>
    </div>
@endsection