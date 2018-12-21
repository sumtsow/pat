<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UpdateUser;
use App\Http\Requests\UpdatePassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
            'users' => User::orderBy('name', 'asc')->get(),
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
     * @param  \Illuminate\Http\Request  $request
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function savepasswd(UpdatePassword  $request)
    {
        $user = User::find(Auth::id());
        if($request->password) {
            $user->password = bcrypt($request->password);
            //$user->updated_at = date();
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
