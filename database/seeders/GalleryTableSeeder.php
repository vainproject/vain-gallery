<?php namespace Modules\Gallery\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Gallery\Entities\Album;
use Modules\Gallery\Entities\AlbumContent;
use Modules\Gallery\Entities\Image;
use Modules\Gallery\Entities\ImageContent;

class GalleryTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // todo: find out why this is necessary, a normal composer
        // classmap wont't work in this scenario
        $factory = app(\Illuminate\Database\Eloquent\Factory::class);
        require(__DIR__ . '/../factories/ModelFactory.php');

        // seed albums
        factory(Album::class, 10)->create()->each(function ($a) {
            // add album content
            $a->contents()->save(factory(AlbumContent::class)->make());
        });

        // seed images
        factory(Image::class, 50)->create()->each(function ($i) {
            // add image content
            $i->contents()->save(factory(ImageContent::class)->make());

            // add media through media library
            // todo: make prettier
            $faker = app(\Faker\Generator::class);
            $i->addMediaFromUrl($faker->imageUrl())->toMediaLibrary();
        });
    }

}