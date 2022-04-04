<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Province;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if(auth()->user()->roles[0]->title == "SuperAdmin") {
            $users = User::with(['roles', 'country', 'province', 'city'])->get();
        } else {
            $users = User::with(['roles', 'country', 'province', 'city'])->whereHas('roles', function($query) {
                $query->whereNotIn('title', ['SuperAdmin', 'Admin']);
            })->get();
        }

        return view('admin.users.index', compact('users'));
    }


    public function users_by_role($role)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::with(['roles', 'country', 'province', 'city'])->whereHas('roles', function($query) use($role) {
            $query->where('title', $role);
        })->get();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::whereNotIn('title', ['SuperAdmin', 'Admin'])->pluck('title', 'id');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provinces = Province::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cities = City::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.users.create', compact('cities', 'countries', 'provinces', 'roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provinces = Province::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cities = City::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $user->load('roles', 'country', 'province', 'city');

        return view('admin.users.edit', compact('cities', 'countries', 'provinces', 'roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles', 'country', 'province', 'city', 'agentApplications', 'managerApplications');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
