@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.installment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.installments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.installment.fields.id') }}
                        </th>
                        <td>
                            {{ $installment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.installment.fields.application') }}
                        </th>
                        <td>
                            {{ $installment->application->form_no ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.installment.fields.due_date') }}
                        </th>
                        <td>
                            {{ $installment->due_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.installment.fields.amount') }}
                        </th>
                        <td>
                            {{ $installment->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.installment.fields.comments') }}
                        </th>
                        <td>
                            {{ $installment->comments }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.installments.index') }}">
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
            <a class="nav-link" href="#installment_payments" role="tab" data-toggle="tab">
                {{ trans('cruds.payment.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="installment_payments">
            @includeIf('admin.installments.relationships.installmentPayments', ['payments' => $installment->installmentPayments])
        </div>
    </div>
</div>

@endsection