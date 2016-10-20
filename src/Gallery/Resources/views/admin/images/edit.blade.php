@extends('gallery::admin.index')

@section('title')
    @lang('gallery::admin.images.title.edit')
@stop

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>@lang('gallery::admin.images.title.edit')</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        {!! Form::model($image, [
            'class' => 'form-horizontal',
            'files' => true,
            'data-remote-success-message' => trans('gallery::admin.images.save.success'),
            'data-remote-error-message' => trans('gallery::admin.images.save.error'),
            'method' => 'PUT',
            'route' => ['gallery.admin.images.update', $image->id]]) !!}

        @include('gallery::admin.images.form')

        {!! Form::close() !!}
    </section><!-- /.content -->
@endsection