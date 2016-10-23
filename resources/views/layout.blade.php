@extends('app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('static/css/gallery.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('static/js/gallery.js') }}"></script>
    {{--<script>--}}
        {{--$('.grid').masonry({--}}
            {{--itemSelector: '.grid-item',--}}
            {{--columnWidth: 200--}}
        {{--});--}}
    {{--</script>--}}
@endsection