@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.payment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.payments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.id') }}
                        </th>
                        <td>
                            {{ $payment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.application') }}
                        </th>
                        <td>
                            {{ $payment->application->form_no ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.challan_no') }}
                        </th>
                        <td>
                            {{ $payment->challan_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.payment_mode') }}
                        </th>
                        <td>
                            {{ App\Models\Payment::PAYMENT_MODE_SELECT[$payment->payment_mode] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.date') }}
                        </th>
                        <td>
                            {{ $payment->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.amount') }}
                        </th>
                        <td>
                            {{ $payment->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.payment_type') }}
                        </th>
                        <td>
                            {{ App\Models\Payment::PAYMENT_TYPE_SELECT[$payment->payment_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.payment_medium') }}
                        </th>
                        <td>
                            {{ App\Models\Payment::PAYMENT_MEDIUM_SELECT[$payment->payment_medium] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.bank_name') }}
                        </th>
                        <td>
                            {{ $payment->bank_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.bank_slip_no') }}
                        </th>
                        <td>
                            {{ $payment->bank_slip_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.bank_payment_date') }}
                        </th>
                        <td>
                            {{ $payment->bank_payment_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.account_no_from') }}
                        </th>
                        <td>
                            {{ $payment->account_no_from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.bank_name_to') }}
                        </th>
                        <td>
                            {{ $payment->bank_name_to }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.account_no_to') }}
                        </th>
                        <td>
                            {{ $payment->account_no_to }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.depositor_name') }}
                        </th>
                        <td>
                            {{ $payment->depositor_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.depositor_cnic') }}
                        </th>
                        <td>
                            {{ $payment->depositor_cnic }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.depositor_contact') }}
                        </th>
                        <td>
                            {{ $payment->depositor_contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.cachier_name') }}
                        </th>
                        <td>
                            {{ $payment->cachier_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.cashier_cnic') }}
                        </th>
                        <td>
                            {{ $payment->cashier_cnic }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.created_by') }}
                        </th>
                        <td>
                            {{ $payment->created_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.remarks') }}
                        </th>
                        <td>
                            {{ $payment->remarks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.installment') }}
                        </th>
                        <td>
                            {{ $payment->installment->due_date ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.payment.fields.cheque_no') }}
                        </th>
                        <td>
                            {{ $payment->cheque_no }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.payments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection