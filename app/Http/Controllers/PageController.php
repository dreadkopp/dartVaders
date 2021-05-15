<?php


namespace App\Http\Controllers;


use App\Models\Page;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 * @Middleware("web")
 */
class PageController extends Controller
{

    /**
     * @Get("/", as="page.lander")
     * @param string $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function lander() {

        /** @var User $user */
        $user = Auth::user();

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
        $code = 200;
        if (is_numeric($slug)) {
            $page = Page::query()->active()->findOrFail($slug);
        }

        if (!$page) {
            $page = Page::query()->active()->where('slug',$slug)->firstOrFail();
        }

        return view('layouts.page',)->with('page',$page);
    }

}
