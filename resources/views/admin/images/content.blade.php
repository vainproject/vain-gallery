<div class="form-group">
    <div class="col-md-12">
        {!! Form::label('title_'. $locale, trans('gallery::admin.images.field.title')) !!}
        {!! Form::text('title_'. $locale, isset($image) && ($content = $image->content($locale, false)) ? $content->title : '', ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-12">
        {!! Form::label('keywords_'. $locale, trans('gallery::admin.images.field.keywords')) !!}
        {!! Form::text('keywords_'. $locale, isset($image) && ($content = $image->content($locale, false)) ? $content->keywords : '', ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-12">
        {!! Form::label('description_'. $locale, trans('gallery::admin.images.field.description')) !!}
        {!! Form::textarea('description_'. $locale, isset($image) && ($content = $image->content($locale, false)) ? $content->description : '',
            ['class' => 'form-control', 'data-expand', 'rows' => 2, 'data-expand-rows-max' => 8]) !!}
    </div>
</div>

{!! Form::label('text_'. $locale, trans('gallery::admin.images.field.text')) !!}
<textarea id='text_{{ $locale }}' name='text_{{ $locale }}' data-editor data-editor-lang="{{ $locale }}">
    @if ($content = isset($image) ? $image->content($locale, false) :  null)
        {!! $content->text !!}
    @endif
</textarea>