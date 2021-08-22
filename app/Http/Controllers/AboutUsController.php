<?php


namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\User;

/**
 * @Middleware ("web")
 * Class AboutUsController
 * @package App\Http\Controllers
 */
class AboutUsController extends Controller
{

    /**
     * @GET("/about_us", as="about.us")
     */
    public function serve() {
        $users = User::query()
            ->where('show_in_listing','>',0)
            ->orderBy('order')
            ->get();

        $content = Page::query()
            ->where('slug','about')
            ->firstOrNew();

        return view('layouts.about',['users' => $users, 'page' => $content]);

    }

}
