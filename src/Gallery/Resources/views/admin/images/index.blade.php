@extends('gallery::admin.index')

@section('title')
    @lang('gallery::gallery.title.index')
@stop

@section('content')

    <section class="content-header">
        <h1>
            @lang('gallery::admin.title.images')
        </h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <a class="btn btn btn-primary" href="{{ route('gallery.admin.images.create') }}">
                    <i class="fa fa-plus-circle"></i> @lang('gallery::admin.images.action.create')
                </a>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>@lang('gallery::admin.images.field.id')</td>
                        <td>@lang('gallery::admin.images.field.slug')</td>
                        <td>@lang('gallery::admin.images.field.author')</td>
                        <td>@lang('gallery::admin.images.field.created_at')</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($images as $image)
                        <tr>
                            <td>{{ $image->id }}</td>
                            <td>{{ $image->slug }} <a href="{{ route('gallery.image.show', ['slug' => $image->slug]) }}" target="_blank"><i class="fa fa-external-link"></i></a></td>
                            <td>@userbadge($image->user)</td>
                            <td>{{ $image->created_at ? $image->created_at->diffForHumans() : '-' }}</td>
                            <td class="text-right">
                                {!! Form::open([
                                    'class' => 'form-inline',
                                    'data-remote',
                                    'data-remote-success-message' => trans('gallery::admin.images.delete.success'),
                                    'data-remote-error-message' => trans('gallery::admin.images.delete.error'),
                                    'route' => ['gallery.admin.images.destroy', $image->id],
                                    'method' => 'DELETE'])
                                !!}
                                <a class="btn btn-sm btn-default" href="{{ route('gallery.admin.images.edit', $image->id) }}"><i class="fa fa-edit"></i> @lang('gallery::admin.images.action.edit')</a>
                                <button class="btn btn-sm btn-danger" type="submit" data-confirm="#modal"><i class="fa fa-trash"></i> @lang('gallery::admin.images.action.destroy')</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @include('gallery::admin.partials.pagination', [ 'items' => $images ])
        </div>
    </section>
    @include('gallery::admin.images.modal')
@stop