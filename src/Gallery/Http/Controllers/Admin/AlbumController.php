<?php namespace Modules\Gallery\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Modules\Gallery\Entities\Album;
use Modules\Gallery\Entities\AlbumContent;
use Modules\Gallery\Http\Requests\AlbumFormRequest;
use Vain\Http\Controllers\Controller;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::paginate();
        return view('gallery::admin.albums.index', ['albums' => $albums]);
    }

    public function create()
    {
//        $this->authorize('create', Album::class);

        $locales = config('app.locales');

        return view('gallery::admin.albums.create', ['locales' => $locales]);
    }

    public function store(AlbumFormRequest $request)
    {
//        $this->authorize('create', Album::class);

        /** @var Album $album */
        $album = Album::create(array_merge($request->all(), ['user_id' => $request->user()->id]));

        foreach (config('app.locales') as $locale => $name) {
            $content = (new AlbumContent())
                ->fillTranslated($locale, $request->all());

            $content->album()->associate($album);
            $content->save();
        }

        return $this->createDefaultResponse($request);
    }

    public function edit($id)
    {
        /** @var Album $Album */
        $album = Album::findOrFail($id);
//        $this->authorize('edit', $album);

        $locales = config('app.locales');

        return view('gallery::admin.albums.edit', ['album' => $album, 'locales' => $locales]);
    }

    public function update(AlbumFormRequest $request, $id)
    {
        /** @var Album $album */
        $album = Album::findOrFail($id);
//        $this->authorize('edit', $album);

        $album->fill($request->all());
        $album->save();

        foreach (config('app.locales') as $locale => $name) {
            $content = $album->contents()
                ->localeOrNew($locale)
                ->fillTranslated($locale, $request->all());

            $content->album()->associate($album);
            $content->save();
        }

        return $this->createDefaultResponse($request);
    }

    public function destroy(Request $request, $id)
    {
        /** @var Album $album */
        $album = Album::findOrFail($id);
//        $this->authorize('destroy', $album);
        $album->delete();

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

        return redirect()->route('blog.admin.categories.index');
    }
}