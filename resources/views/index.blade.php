@extends('app')

@section('title')
    @lang('gallery::gallery.title.index')
@stop

@section('headline')
    <h1 class="text-uppercase">@lang('gallery::gallery.title.index')</h1>
    <h2>@lang('gallery::gallery.title.teaser')</h2>
@endsection

@section('content')
    <div id="links" class="links"></div>

    <!-- The Gallery as lightbox dialog, should be a child element of the document body -->
    <div id="blueimp-gallery" class="blueimp-gallery">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <ol class="indicator"></ol>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('static/css/gallery.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('static/js/gallery.js') }}"></script>
    <script>
        $(function () {
            'use strict'

            // Load demo images from flickr:
            $.ajax({
                // Flickr API is SSL only:
                // https://code.flickr.net/2014/04/30/flickr-api-going-ssl-only-on-june-27th-2014/
                url: 'https://api.flickr.com/services/rest/',
                data: {
                    format: 'json',
                    method: 'flickr.interestingness.getList',
                    api_key: '7617adae70159d09ba78cfec73c13be3' // jshint ignore:line
                },
                dataType: 'jsonp',
                jsonp: 'jsoncallback'
            }).done(function (result) {
                var carouselLinks = []
                var linksContainer = $('#links')
                var baseUrl
                // Add the demo images as links with thumbnails to the page:
                $.each(result.photos.photo, function (index, photo) {
                    baseUrl = 'https://farm' + photo.farm + '.static.flickr.com/' +
                            photo.server + '/' + photo.id + '_' + photo.secret
                    $('<a/>')
                            .append($('<img>').prop('src', baseUrl + '_s.jpg'))
                            .prop('href', baseUrl + '_b.jpg')
                            .prop('title', photo.title)
                            .attr('data-gallery', '')
                            .appendTo(linksContainer)
                    carouselLinks.push({
                        href: baseUrl + '_c.jpg',
                        title: photo.title
                    })
                })
            })
        })
    </script>
@endsection