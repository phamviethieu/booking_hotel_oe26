<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

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

            return redirect()->route('users.index');
        } catch (ModelNotFoundException $e) {
            return view('admin.layouts.404');
        }
    }
}
