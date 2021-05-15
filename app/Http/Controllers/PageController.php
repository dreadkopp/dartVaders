<?php


namespace App\Http\Controllers;


use TCG\Voyager\Models\Page;

/**
 * @Middleware("guest")
 */
class PageController extends Controller
{

    /**
     * @Get("/", as="page.lander")
     * @param string $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function lander() {

        $page = Page::query()->active()->first();

        return view('layouts.page',)->with('page',$page);
    }

    /**
     * @Get("/page/{slug}", as="page.view")
     * @param string $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(string $slug) {

        $page = null;
        if (is_numeric($slug)) {
            $page = Page::query()->active()->findOrFail($slug);
        }

        if (!$page) {
            $page = Page::query()->active()->where('slug',$slug)->firstOrFail();
        }

        return view('layouts.page',)->with('page',$page);
    }

}
