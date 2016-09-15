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
      $profile = User::find($id);
      return view('user.edit', array('user' => $profile));
    }

    public function update(Request $request, $id)
    {
       $user = User::find($id);
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = bcrypt($request->password);

       $user->save();
    }

}
