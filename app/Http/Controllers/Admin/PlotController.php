<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPlotRequest;
use App\Http\Requests\StorePlotRequest;
use App\Http\Requests\UpdatePlotRequest;
use App\Models\City;
use App\Models\Plot;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlotController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('plot_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $plots = Plot::with(['city'])->get();

        $cities = City::get();

        return view('admin.plots.index', compact('cities', 'plots'));
    }

    public function create()
    {
        abort_if(Gate::denies('plot_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cities = City::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.plots.create', compact('cities'));
    }

    public function store(StorePlotRequest $request)
    {
        $plot = Plot::create($request->all());

        return redirect()->route('admin.plots.index');
    }

    public function edit(Plot $plot)
    {
        abort_if(Gate::denies('plot_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cities = City::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $plot->load('city');

        return view('admin.plots.edit', compact('cities', 'plot'));
    }

    public function update(UpdatePlotRequest $request, Plot $plot)
    {
        $plot->update($request->all());

        return redirect()->route('admin.plots.index');
    }

    public function show(Plot $plot)
    {
        abort_if(Gate::denies('plot_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $plot->load('city', 'plotApplications');

        return view('admin.plots.show', compact('plot'));
    }

    public function destroy(Plot $plot)
    {
        abort_if(Gate::denies('plot_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $plot->delete();

        return back();
    }

    public function massDestroy(MassDestroyPlotRequest $request)
    {
        Plot::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
