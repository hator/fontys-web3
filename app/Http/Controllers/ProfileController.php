<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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

    protected function validator(array $data)
    {
        return User::validator($data);
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

      return view('user.show', array('user' => $profile));
    }

    public function edit($id)
    {
      $this->authorize('update', $profile);

      $profile = User::find($id);
      return view('user.edit', array('user' => $profile));
    }

    public function update(Request $request, $id)
    {
      $this->authorize('update', $profile);
      \Debugbar::error($request);
      $validator = $this->validator($request->all());
      if($validator->fails())
      {
        return redirect('/profile/5/edit')
                     ->withErrors($validator)
                     ->withInput();
      }
      else
      {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = User::encryptPassword($request->password);

        $user->save();
      }
    }

}
