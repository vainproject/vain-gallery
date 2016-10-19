<?php namespace Modules\Gallery\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravelrus\LocalizedCarbon\Traits\LocalizedEloquentTrait;
use Modules\User\Entities\User;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Vain\Packages\Translator\Translatable;
use Vain\Packages\Translator\TranslatableTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Image extends Model implements Translatable, HasMedia
{
    use SoftDeletes, TranslatableTrait, LocalizedEloquentTrait, HasMediaTrait;

    protected $table = "gallery_images";

    protected $fillable = ['slug', 'album_id', 'user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contents()
    {
        return $this->hasMany(ImageContent::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}