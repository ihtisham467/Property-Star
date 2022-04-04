<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyApplicationRequest;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Application;
use App\Models\Client;
use App\Models\Dealer;
use App\Models\Plot;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplicationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('application_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $applications = Application::with(['client', 'plot', 'dealer', 'agent', 'manager'])->get();

        $clients = Client::get();

        $plots = Plot::get();

        $dealers = Dealer::get();

        $users = User::get();

        return view('admin.applications.index', compact('applications', 'clients', 'dealers', 'plots', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('application_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        // $plots = Plot::pluck('plotid', 'id', 'plot_type', 'size', 'boulevard', 'main_road', 'facing_park', 'corner', 'twoor_more_sides_open')->prepend(trans('global.pleaseSelect'), '');
        $plots = Plot::all();

        $dealers = Dealer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.applications.create', compact('clients', 'dealers', 'plots'));
    }

    public function store(StoreApplicationRequest $request)
    {
        $application = Application::create($request->all());

        return redirect()->route('admin.applications.index');
    }

    public function edit(Application $application)
    {
        abort_if(Gate::denies('application_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $plots = Plot::pluck('plotid', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dealers = Dealer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $application->load('client', 'plot', 'dealer', 'agent', 'manager');

        return view('admin.applications.edit', compact('application', 'clients', 'dealers', 'plots'));
    }

    public function update(UpdateApplicationRequest $request, Application $application)
    {
        $application->update($request->all());

        return redirect()->route('admin.applications.index');
    }

    public function show(Application $application)
    {
        abort_if(Gate::denies('application_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $application->load('client', 'plot', 'dealer', 'agent', 'manager', 'applicationPayments', 'applicationInstallments');

        return view('admin.applications.show', compact('application'));
    }

    public function destroy(Application $application)
    {
        abort_if(Gate::denies('application_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $application->delete();

        return back();
    }

    public function massDestroy(MassDestroyApplicationRequest $request)
    {
        Application::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
