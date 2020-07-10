<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userRepo;
    protected $roleRepo;

    public function __construct(
        UserRepositoryInterface $userRepo,
        RoleRepositoryInterface $roleRepo
    )
    {
        $this->userRepo = $userRepo;
        $this->roleRepo = $roleRepo;
    }

    public function index()
    {
        $users = $this->userRepo->getAll();

        return view('admin.users.list', compact('users'));
    }

    public function show($id)
    {
        try {
            $user = $this->userRepo->find($id);

            return view('admin.users.show', compact('user'));
        } catch (ModelNotFoundException $e) {
            return view('admin.layouts.404');
        }
    }

    public function create()
    {
        $roles = $this->roleRepo->getAll();

        return view('admin.users.add', compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $data = $request->all();
        $this->userRepo->create($data);
        Session::flash('created', trans('message.alert.userCreated'));
    }

    public function edit($id)
    {
        $roles = $this->roleRepo->getAll();
        try {
            $user = $this->userRepo->find($id);

            return view('admin.users.edit', compact('user', 'roles'));
        } catch (ModelNotFoundException $e) {
            return view('admin.layouts.404');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();

            $this->userRepo->update($id, $data);
            Session::flash('updated', trans('message.alert.userUpdated'));

            return redirect()->route('users.show', $id);
        } catch (ModelNotFoundException $e) {
            return view('admin.layouts.404');
        }
    }

    public function destroy($id)
    {
        try {
            $this->userRepo->delete($id);
            Session::flash('updated', trans('message.alert.userDeleted'));

            return redirect()->route('users.index');
        } catch (ModelNotFoundException $e) {
            return view('admin.layouts.404');
        }
    }
}
