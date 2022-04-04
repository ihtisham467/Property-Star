@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.application.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.applications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.id') }}
                        </th>
                        <td>
                            {{ $application->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.form_no') }}
                        </th>
                        <td>
                            {{ $application->form_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.client') }}
                        </th>
                        <td>
                            {{ $application->client->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.plot') }}
                        </th>
                        <td>
                            {{ $application->plot->plotid ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.dealer') }}
                        </th>
                        <td>
                            {{ $application->dealer->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.agent') }}
                        </th>
                        <td>
                            {{ $application->agent->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.manager') }}
                        </th>
                        <td>
                            {{ $application->manager->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.discount') }}
                        </th>
                        <td>
                            {{ $application->discount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.total_after_discount') }}
                        </th>
                        <td>
                            {{ $application->total_after_discount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.comments') }}
                        </th>
                        <td>
                            {{ $application->comments }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.payment_type') }}
                        </th>
                        <td>
                            {{ App\Models\Application::PAYMENT_TYPE_SELECT[$application->payment_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.no_of_installments') }}
                        </th>
                        <td>
                            {{ $application->no_of_installments }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.application.fields.installments_period') }}
                        </th>
                        <td>
                            {{ App\Models\Application::INSTALLMENTS_PERIOD_SELECT[$application->installments_period] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.applications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#application_payments" role="tab" data-toggle="tab">
                {{ trans('cruds.payment.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#application_installments" role="tab" data-toggle="tab">
                {{ trans('cruds.installment.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="application_payments">
            @includeIf('admin.applications.relationships.applicationPayments', ['payments' => $application->applicationPayments])
        </div>
        <div class="tab-pane" role="tabpanel" id="application_installments">
            @includeIf('admin.applications.relationships.applicationInstallments', ['installments' => $application->applicationInstallments])
        </div>
    </div>
</div>

@endsection