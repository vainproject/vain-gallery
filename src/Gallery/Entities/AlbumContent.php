<?php namespace Modules\Gallery\Entities;

use Illuminate\Database\Eloquent\Model;
use Vain\Packages\Translator\TranslatableContentTrait;

class AlbumContent extends Model
{
    use TranslatableContentTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gallery_albums_content';

    /**
     * @var array
     */
    protected $fillable = ['locale', 'title', 'text', 'keywords', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    /**
     * accessor for intro text of the post.
     *
     * @param $value
     *
     * @return string
     */
    public function getTeaserAttribute($value)
    {
        $parts = $this->prepareTeaserAndContent();

        return reset($parts);
    }

    /**
     * accessor for main section text of the post (without the teaser).
     *
     * @param $value
     *
     * @return string
     */
    public function getBodyAttribute($value)
    {
        $parts = $this->prepareTeaserAndContent();

        return count($parts) > 1 ? end($parts) : '';
    }

    /**
     * separates the text into teaser and content sections
     *
     * @return array
     */
    private function prepareTeaserAndContent()
    {
        return preg_split('/<hr\s*\/?>/', $this->text, 2);
    }
}
