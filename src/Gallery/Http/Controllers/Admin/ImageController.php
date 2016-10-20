<?php namespace Modules\Gallery\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Modules\Gallery\Entities\Album;
use Modules\Gallery\Entities\Image;
use Modules\Gallery\Entities\ImageContent;
use Modules\Gallery\Http\Requests\ImageFormRequest;
use Vain\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::paginate();
        return view('gallery::admin.images.index', ['images' => $images]);
    }

    public function create()
    {
//        $this->authorize('create', Image::class);

        $locales = config('app.locales');

        return view('gallery::admin.images.create', [
            'locales' => $locales,
            'albums' => Album::all()->lists('content.title', 'id'),
        ]);
    }

    public function store(ImageFormRequest $request)
    {
//        $this->authorize('create', Image::class);

        /** @var Image $image */
        $image = Image::create(array_merge($request->all(), ['user_id' => $request->user()->id]));

        if ($request->hasFile('image')) {
            $image->addMedia($request->file('image'))
                ->toMediaLibrary();
        }

        foreach (config('app.locales') as $locale => $name) {
            $content = (new ImageContent())
                ->fillTranslated($locale, $request->all());

            $content->image()->associate($image);
            $content->save();
        }

        return $this->createDefaultResponse($request);
    }

    public function edit($id)
    {
        /** @var Image $Image */
        $image = Image::findOrFail($id);
//        $this->authorize('edit', $image);

        $locales = config('app.locales');

        return view('gallery::admin.images.edit', [
            'image' => $image,
            'locales' => $locales,
            'albums' => Album::all()->lists('content.title', 'id'),
        ]);
    }

    public function update(ImageFormRequest $request, $id)
    {
        /** @var Image $image */
        $image = Image::findOrFail($id);
//        $this->authorize('edit', $image);

        $image->fill($request->all());
        $image->save();

        if ($request->hasFile('image')) {
            $image->clearMediaCollection();
            $image->addMedia($request->file('image'))
                ->toMediaLibrary();
        }

        foreach (config('app.locales') as $locale => $name) {
            $content = $image->contents()
                ->localeOrNew($locale)
                ->fillTranslated($locale, $request->all());

            $content->image()->associate($image);
            $content->save();
        }

        return $this->createDefaultResponse($request);
    }

    public function destroy(Request $request, $id)
    {
        /** @var Image $image */
        $image = Image::findOrFail($id);
//        $this->authorize('destroy', $image);
        $image->delete();

        return $this->createDefaultResponse($request);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    protected function createDefaultResponse($request)
    {
        if ($request->ajax()) {
            return response('', 200);
        }

        return redirect()->route('gallery.admin.images.index');
    }
}