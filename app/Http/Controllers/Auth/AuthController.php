<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Models\Page;

/**
 * @Middleware("web")
 */
class AuthController extends Controller
{

    /**
     * @Get("/logoff", as="auth.logoff")
     * @param string $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function logout() {

        Auth::logout();

        return redirect('/');
    }


}
