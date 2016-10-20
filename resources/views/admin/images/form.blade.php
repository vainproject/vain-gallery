<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <button class="btn btn-success" type="submit">
                    <i class="fa fa-floppy-o fa-lg"></i>&nbsp;
                    @lang('gallery::admin.images.action.save')
                </button>
                <a class="btn btn-default" href="{{ route('gallery.admin.images.index') }}">
                    <i class="fa fa-ban fa-lg"></i>&nbsp;
                    @lang('gallery::admin.images.action.abort')
                </a>
            </div>
        </div>
    </div>
</div>

@include('partials.errors', [ 'message' => trans('app.errors.input') ])

<div class="row">

    <div class="col-md-6 col-sm-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('gallery::admin.images.section.general')</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    {!! Form::label('slug', trans('gallery::admin.images.field.slug'), ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('album_id', trans('gallery::admin.images.field.album_id'), ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::select('album_id', $albums, isset($image) ? $image->album : '', ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">@lang('gallery::admin.images.section.image')</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    {!! Form::label('image', trans('gallery::admin.images.field.image'), ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::file('image', null) !!}
                    </div>
                    @if(isset($image) && $image->hasMedia())
                        <div class="col-sm-3">
                            @foreach($image->getMedia() as $media)
                                <img src="{{ $media->getUrl() }}" class="col-sm-12 pull-right">
                            @endforeach
                        </div>
                    @endif
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>

</div><!-- /.row -->

<div role="tabpanel" class="nav-tabs-custom">
    <ul class="nav nav-tabs" role="tablist" data-auto-active>
        @foreach($locales as $locale => $name)
            <li role="presentation">
                <a href="#{{ $locale }}" aria-controls="{{ $locale }}" role="tab" data-toggle="tab">{{ $name }}</a>
            </li>
        @endforeach
    </ul>
    <div class="tab-content" data-auto-active>
        @foreach($locales as $locale => $name)
            <div role="tabpanel" class="tab-pane" id="{{ $locale }}">
                @include('gallery::admin.images.content', ['locale' => $locale])
            </div>
        @endforeach
    </div>
</div>

@section('scripts')
    <script src="{{ asset( 'vendor/ckeditor/ckeditor.js' )  }}"></script>
@stop