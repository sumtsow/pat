<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UpdateUser;
use App\Http\Requests\UpdatePassword;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index', [
            'users' => User::getAll(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user.edit',[
            'user' => User::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUser  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();
        return redirect('users');
    }
    
    /**
     * Switch on/off user account state used by `email_verified_at` field.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchstate($id)
    {
        $user = User::find($id);
        $user->email_verified_at ? $user->email_verified_at = null : $user->email_verified_at = date("Y-m-d H:i:s");
        $user->save();
        return redirect('users');
    }
    
    /**
     * Change password form
     *
     * @return \Illuminate\Http\Response
     */
    public function passwd()
    {
        return view('me');
    }
    
    /**
     * Change password action
     *
     * @param  \App\Http\Requests\UpdatePassword  $request
     * @return \Illuminate\Http\Response
     */
    public function savepasswd(UpdatePassword  $request)
    {
        $user = User::find(Auth::id());
        if($request->password) {
            $user->password = bcrypt($request->password);
            $user->updated_at = date("Y-m-d H:i:s");
        }
        $user->save();
        if($user->role == 'admin') {
            return redirect('users');
        }
        else {
            return redirect()->back();
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('users');
    }
    
}
