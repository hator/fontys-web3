<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Storage;
use Image;

class ProfileController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validator(array $data, $id)
    {
        return User::edit_validator($data, $id);
    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $profile = User::find($id);

        $this->authorize('show', $profile);

        return view('user.show', array(
            'user' => $profile,
            'articles' => $profile->articles,
        ));
    }

    public function edit($id)
    {
        $profile = User::find($id);
        $this->authorize('update', $profile);

        return view('user.edit', array('user' => $profile));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $this->authorize('update', $user);
        $validator = $this->validator($request->all(), $id);
        if($validator->fails())
        {
            return redirect()
                ->action('ProfileController@edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        }
        else
        {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = User::encryptPassword($request->password);

            if(Input::file('image')) {
                $imageFiletype = 'png';
                $image = $this->processProfileImage(Input::file('image'), $imageFiletype);
                $filename = $this->profileImageFilepath($user, $image, $imageFiletype);
                Storage::put('public/'.$filename, $image);
                $user->image_path = 'storage/'.$filename;
            }

            $user->save();

            return redirect()->action('ProfileController@show', ['id' => $id]);
        }
    }

    private function processProfileImage($file, $filetype) {
        $img = Image::make($file);

        $img->fit(100, 100, function ($constraint) {
            $constraint->upsize();
        });

        $width = $img->width();
        $height = $img->height();

        $mask = Image::canvas($width, $height, '#000000');
        $mask->circle($width, $width/2, $height/2, function($draw) {
            $draw->background('#ffffff');
        });

        $img->mask($mask);
        $img->stream($filetype);

        return $img;
    }

    private function profileImageFilepath($user, $img, $extension) {
        return 'profile/' . sha1($user->id . $img->filesize() . time()) . '.' . $extension;
    }
}
