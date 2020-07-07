<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.list', compact('users'));
    }

    public function show($id)
    {
        try {
            $user = User::findOrFail($id);

            return view('admin.users.show', compact('user'));
        } catch (ModelNotFoundException $e) {
            return view('admin.layouts.404');
        }
    }

    public function create()
    {
        $roles = Role::all();

        return view('admin.users.add', compact('roles'));
    }

    public function store(UserRequest $request)
    {
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);
        Session::flash('created', trans('message.alert.userCreated'));
    }

    public function edit($id)
    {
        $roles = Role::all();
        try {
            $user = User::findOrFail($id);

            return view('admin.users.edit', compact('user', 'roles'));
        } catch (ModelNotFoundException $e) {
            return view('admin.layouts.404');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->update($request->all());
            Session::flash('updated', trans('message.alert.userUpdated'));

            return redirect()->route('users.show', $id);
        } catch (ModelNotFoundException $e) {
            return view('admin.layouts.404');
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            Session::flash('updated', trans('message.alert.userDeleted'));

            return redirect()->route('users.index');
        } catch (ModelNotFoundException $e) {
            return view('admin.layouts.404');
        }
    }
}
