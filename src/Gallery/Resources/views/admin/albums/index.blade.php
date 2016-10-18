@extends('gallery::admin.index')

@section('title')
    @lang('gallery::gallery.title.index')
@stop

@section('content')

    <section class="content-header">
        <h1>
            @lang('gallery::admin.title.albums')
        </h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <a class="btn btn btn-primary" href="{{ route('gallery.admin.albums.create') }}">
                    <i class="fa fa-plus-circle"></i> @lang('gallery::admin.albums.action.create')
                </a>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>@lang('gallery::admin.albums.field.id')</td>
                        <td>@lang('gallery::admin.albums.field.slug')</td>
                        <td>@lang('gallery::admin.albums.field.author')</td>
                        <td>@lang('gallery::admin.albums.field.created_at')</td>
                        <td>@lang('gallery::admin.albums.field.active')</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($albums as $album)
                        <tr>
                            <td>{{ $album->id }}</td>
                            <td>{{ $album->slug }} <a href="{{ route('gallery.album.show', ['slug' => $album->slug]) }}" target="_blank"><i class="fa fa-external-link"></i></a></td>
                            <td>@userbadge($album->user)</td>
                            <td>{{ $album->created_at ? $album->created_at->diffForHumans() : '-' }}</td>
                            <td><i class="fa fa-"{{ $album->active ? 'check' : 'times' }}></i></td>
                            <td class="text-right">
                                {!! Form::open([
                                    'class' => 'form-inline',
                                    'data-remote',
                                    'data-remote-success-message' => trans('gallery::admin.albums.delete.success'),
                                    'data-remote-error-message' => trans('gallery::admin.albums.delete.error'),
                                    'route' => ['gallery.admin.albums.destroy', $album->id],
                                    'method' => 'DELETE'])
                                !!}
                                <a class="btn btn-sm btn-default" href="{{ route('gallery.admin.albums.edit', $album->id) }}"><i class="fa fa-edit"></i> @lang('gallery::admin.albums.action.edit')</a>
                                <button class="btn btn-sm btn-danger" type="submit" data-confirm="#modal"><i class="fa fa-trash"></i> @lang('gallery::admin.albums.action.destroy')</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @include('gallery::admin.partials.pagination', [ 'items' => $albums ])
        </div>
    </section>
    @include('gallery::admin.albums.modal')
@stop