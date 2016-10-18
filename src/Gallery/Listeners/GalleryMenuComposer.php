<?php

namespace Modules\Gallery\Listeners;

use Illuminate\Support\Facades\Auth;
use Vain\Events\BackendMenuCreated;
use Vain\Events\FrontendMenuCreated;

class GalleryMenuComposer
{
    /**
     * @param FrontendMenuCreated $event
     */
    public function composeFrontendMenu(FrontendMenuCreated $event)
    {
        /*if (Auth::check() && policy(Post::class)->index(Auth::user())) {
            $event->handler->addChild('blog::blog.index')
                ->setExtra('routes', ['blog.post.show', 'blog.category.show'])
                ->setUri(route('blog.post.index'))
                ->setExtra('icon', 'newspaper-o');
        }*/
    }

    /**
     * @param BackendMenuCreated $event
     */
    public function composeBackendMenu(BackendMenuCreated $event)
    {
        $event->handler->addChild('gallery.admin')
            ->setUri('#')
            ->setLabel('gallery::admin.title.index')
            ->setExtra('icon', 'newspaper-o')
            ->setUri(route('gallery.album.index'));

        $event->handler['gallery.admin']->addChild('gallery::admin.title.albums')
            ->setExtra('patterns', ['/gallery\.admin\.albums\.(.+)/'])
            ->setUri(route('gallery.admin.albums.index'))
            ->setExtra('icon', 'circle-o');

        $event->handler['gallery.admin']->addChild('gallery::admin.title.images')
            ->setExtra('patterns', ['/gallery\.admin\.images\.(.+)/'])
            ->setUri(route('gallery.admin.images.index'))
            ->setExtra('icon', 'circle-o');
    }

    /**
     * @param \Illuminate\Events\Dispatcher $event
     */
    public function subscribe($event)
    {
        $event->listen('Vain\Events\FrontendMenuCreated', 'Modules\Gallery\Listeners\GalleryMenuComposer@composeFrontendMenu');
        $event->listen('Vain\Events\BackendMenuCreated', 'Modules\Gallery\Listeners\GalleryMenuComposer@composeBackendMenu');
    }
}
