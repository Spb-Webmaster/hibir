<?php

namespace App\Http\Controllers\Dashboard\UserPhoto;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateFormRequest;
use App\Http\Requests\UpdatePasswordFormRequest;
use App\Http\Requests\UploadRequest;
use App\Models\User;

use App\Models\UserPhoto;
use Domain\User\ViewModels\UserViewModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserPhotoController extends Controller
{
    public function page($id)
    {
        // бред
        $user = auth()->user();
        $items = [];

        $items = UserPhoto::query()->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(50);

        if ($user->id == $id) {
            return view('dashboard.user_photos.user_page', [
                'user' => $user,
                'items' => $items
            ]);
        }
        abort(404);


    }

    public function upload(UploadRequest $request)
    {

        //dd($request->all());

        $user = auth()->user();

        if (isset($request->photos)) {
            if (count($request->photos) > 10) {
                $image_error = str_replace("{image}", 10, config('message_flash.alert.user_img_count'));
                flash()->alert($image_error);
                return redirect()->back();

            }
        }

        foreach ($request->photos as $photo) {
            $filename = $photo->store('users/' . $user->id . '/photos');
            UserPhoto::create([
                'user_id' => $user->id,
                'img' => $filename
            ]);
        }
        $image_successes = str_replace("{image}", count($request->photos), config('message_flash.info.user_img_successes'));
        flash()->info($image_successes);

        return redirect()->route('cabinet.photos', ['id' => $user->id]);
    }


}
