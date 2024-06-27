<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    //
    public function update(UpdateAvatarRequest $request){
       
        $path = $request->file('avatar')->store('public/avatars');
    // or    $path = Storage::disk('public')->put('avatars',$request->file('avatar'));

        if ($oldAvatar = $request->user()->avatar){
            Storage::delete($oldAvatar);
        }

        auth()->user()->update(['avatar'=>storage_path('app')."/$path"]);
        return redirect(route('profile.edit'))->with('message','avatar uploaded');

    }
}
