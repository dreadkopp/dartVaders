<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerUserController as BaseVoyagerUserController;

class VoyagerUserController extends BaseVoyagerUserController
{
    public function profile(Request $request)
    {

        if(!Auth::check()) {
            return redirect('/');
        }

        $user = Auth::user();

        return view('admin.users.edit-add',compact('user'));
    }

    // POST BR(E)AD
    public function update(Request $request, $id)
    {
        $props = $request->all();
        unset($props['current_pass']);
        unset($props['new_pass']);


        //TODO:: handle pass-reset

        $user = User::find($id);
        foreach ($props as $prop => $val) {
            $user->$prop = $val;
        }
        $user->save();

        return response('',204);
    }

    public function avatar(Request $request) {

        /** @var \Illuminate\Http\UploadedFile $img */
        $img = $request->file('avatar');

        Storage::disk('public')->put($img->getClientOriginalName(),$img->getContent());

        $img_link = '/storage/'.$img->getClientOriginalName();

        $user = Auth::user();

        $user->avatar = $img_link;
        $user->save();


        return response()->json(['img' => asset($img_link)]);


    }
}
