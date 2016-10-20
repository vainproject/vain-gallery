@extends('gallery::admin.index')

@section('title')
    @lang('gallery::admin.albums.title.create')
@stop

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>@lang('gallery::admin.albums.title.create')</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        {!! Form::open([
            'class' => 'form-horizontal',
            'data-remote',
            'data-remote-success-redirect' => route('gallery.admin.albums.index'),
            'data-remote-error-message' => trans('gallery::admin.albums.save.error'),
            'route' => ['gallery.admin.albums.store']]) !!}

        @include('gallery::admin.albums.form')

        {!! Form::close() !!}
    </section><!-- /.content -->
@endsection