<div class="form-group">
    <div class="col-md-12">
        {!! Form::label('title_'. $locale, trans('gallery::admin.albums.field.title')) !!}
        {!! Form::text('title_'. $locale, isset($album) && ($content = $album->content($locale, false)) ? $content->title : '', ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-12">
        {!! Form::label('keywords_'. $locale, trans('gallery::admin.albums.field.keywords')) !!}
        {!! Form::text('keywords_'. $locale, isset($album) && ($content = $album->content($locale, false)) ? $content->keywords : '', ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-12">
        {!! Form::label('description_'. $locale, trans('gallery::admin.albums.field.description')) !!}
        {!! Form::textarea('description_'. $locale, isset($album) && ($content = $album->content($locale, false)) ? $content->description : '',
            ['class' => 'form-control', 'data-expand', 'rows' => 2, 'data-expand-rows-max' => 8]) !!}
    </div>
</div>

{!! Form::label('text_'. $locale, trans('gallery::admin.albums.field.text')) !!}
<textarea id='text_{{ $locale }}' name='text_{{ $locale }}' data-editor data-editor-lang="{{ $locale }}">
    @if ($content = isset($album) ? $album->content($locale, false) :  null)
        {!! $content->text !!}
    @endif
</textarea>