<?php


namespace App\Http\Controllers;


use TCG\Voyager\Models\Post;

/**
 * @Middleware("web")
 * Class PostsController
 * @package App\Http\Controllers
 */
class PostsController extends Controller
{

    /**
     * @Get("/blog",as="blog.list")
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getData() {
        $posts = Post::query()->paginate(2);
        return view('layouts.posts', compact('posts'))->with('title', 'Blog');
    }

}
