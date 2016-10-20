@extends('gallery::admin.index')

@section('title')
    @lang('gallery::admin.images.title.create')
@stop

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>@lang('gallery::admin.images.title.create')</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        {!! Form::open([
            'class' => 'form-horizontal',
            'files' => true,
            'data-remote-success-redirect' => route('gallery.admin.images.index'),
            'data-remote-error-message' => trans('gallery::admin.images.save.error'),
            'route' => ['gallery.admin.images.store']]) !!}

        @include('gallery::admin.images.form')

        {!! Form::close() !!}
    </section><!-- /.content -->
@endsection