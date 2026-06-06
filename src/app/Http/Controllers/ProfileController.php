<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();

        return view('mypage.profile', compact('user'));
    }

    public function update(ProfileRequest $request)
    {
        $user = auth()->user();

        // プロフィール画像保存
        if ($request->hasFile('image')) {

            $path = $request->file('image')
                ->store('profile_images', 'public');

            $user->image_path = $path;
        }

        // ユーザー情報更新
        $user->name = $request->name;
        $user->postal_code = $request->postal_code;
        $user->address = $request->address;
        $user->building = $request->building;

        $user->save();

        return redirect('/mypage');
    }
}