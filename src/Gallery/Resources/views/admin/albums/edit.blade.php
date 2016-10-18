@extends('gallery::admin.index')

@section('title')
    @lang('gallery::admin.albums.title.edit')
@stop

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>@lang('gallery::admin.albums.title.edit')</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        {!! Form::model($album, [
            'class' => 'form-horizontal',
            'data-remote',
            'data-remote-success-message' => trans('gallery::admin.albums.save.success'),
            'data-remote-error-message' => trans('gallery::admin.albums.save.error'),
            'method' => 'PUT',
            'route' => ['gallery.admin.albums.update', $album->id]]) !!}

        @include('gallery::admin.albums.form')

        {!! Form::close() !!}
    </section><!-- /.content -->
@endsection