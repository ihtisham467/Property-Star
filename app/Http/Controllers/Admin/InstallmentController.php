<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInstallmentRequest;
use App\Http\Requests\StoreInstallmentRequest;
use App\Http\Requests\UpdateInstallmentRequest;
use App\Models\Application;
use App\Models\Installment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InstallmentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('installment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $installments = Installment::with(['application'])->get();

        $applications = Application::get();

        return view('admin.installments.index', compact('applications', 'installments'));
    }

    public function create()
    {
        abort_if(Gate::denies('installment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $applications = Application::pluck('form_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.installments.create', compact('applications'));
    }

    public function store(StoreInstallmentRequest $request)
    {
        $installment = Installment::create($request->all());

        return redirect()->route('admin.installments.index');
    }

    public function edit(Installment $installment)
    {
        abort_if(Gate::denies('installment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $applications = Application::pluck('form_no', 'id')->prepend(trans('global.pleaseSelect'), '');

        $installment->load('application');

        return view('admin.installments.edit', compact('applications', 'installment'));
    }

    public function update(UpdateInstallmentRequest $request, Installment $installment)
    {
        $installment->update($request->all());

        return redirect()->route('admin.installments.index');
    }

    public function show(Installment $installment)
    {
        abort_if(Gate::denies('installment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $installment->load('application', 'installmentPayments');

        return view('admin.installments.show', compact('installment'));
    }

    public function destroy(Installment $installment)
    {
        abort_if(Gate::denies('installment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $installment->delete();

        return back();
    }

    public function massDestroy(MassDestroyInstallmentRequest $request)
    {
        Installment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
