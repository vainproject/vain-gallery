<?php namespace Modules\Gallery\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravelrus\LocalizedCarbon\Traits\LocalizedEloquentTrait;
use Modules\User\Entities\User;
use Vain\Packages\Translator\Translatable;
use Vain\Packages\Translator\TranslatableTrait;

class Album extends Model implements Translatable
{
    use SoftDeletes, TranslatableTrait, LocalizedEloquentTrait;

    protected $table = "gallery_albums";

    protected $fillable = ['slug', 'active', 'user_id'];

    public function __toString()
    {
        return $this->content->title;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contents()
    {
        return $this->hasMany(AlbumContent::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return mixed
     */
    public function scopeActive()
    {
        return $this->where('active', true);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}