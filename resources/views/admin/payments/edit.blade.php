@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.payment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.payments.update", [$payment->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="application_id">{{ trans('cruds.payment.fields.application') }}</label>
                <select class="form-control select2 {{ $errors->has('application') ? 'is-invalid' : '' }}" name="application_id" id="application_id" required>
                    @foreach($applications as $id => $entry)
                        <option value="{{ $id }}" {{ (old('application_id') ? old('application_id') : $payment->application->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('application'))
                    <span class="text-danger">{{ $errors->first('application') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.application_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="challan_no">{{ trans('cruds.payment.fields.challan_no') }}</label>
                <input class="form-control {{ $errors->has('challan_no') ? 'is-invalid' : '' }}" type="text" name="challan_no" id="challan_no" value="{{ old('challan_no', $payment->challan_no) }}" required>
                @if($errors->has('challan_no'))
                    <span class="text-danger">{{ $errors->first('challan_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.challan_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.payment.fields.payment_mode') }}</label>
                <select class="form-control {{ $errors->has('payment_mode') ? 'is-invalid' : '' }}" name="payment_mode" id="payment_mode" required>
                    <option value disabled {{ old('payment_mode', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Payment::PAYMENT_MODE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_mode', $payment->payment_mode) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_mode'))
                    <span class="text-danger">{{ $errors->first('payment_mode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.payment_mode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.payment.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $payment->date) }}" required>
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.payment.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $payment->amount) }}" step="1" required>
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.payment.fields.payment_type') }}</label>
                <select class="form-control {{ $errors->has('payment_type') ? 'is-invalid' : '' }}" name="payment_type" id="payment_type" required>
                    <option value disabled {{ old('payment_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Payment::PAYMENT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_type', $payment->payment_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_type'))
                    <span class="text-danger">{{ $errors->first('payment_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.payment_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.payment.fields.payment_medium') }}</label>
                <select class="form-control {{ $errors->has('payment_medium') ? 'is-invalid' : '' }}" name="payment_medium" id="payment_medium" required>
                    <option value disabled {{ old('payment_medium', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Payment::PAYMENT_MEDIUM_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_medium', $payment->payment_medium) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_medium'))
                    <span class="text-danger">{{ $errors->first('payment_medium') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.payment_medium_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bank_name">{{ trans('cruds.payment.fields.bank_name') }}</label>
                <input class="form-control {{ $errors->has('bank_name') ? 'is-invalid' : '' }}" type="text" name="bank_name" id="bank_name" value="{{ old('bank_name', $payment->bank_name) }}">
                @if($errors->has('bank_name'))
                    <span class="text-danger">{{ $errors->first('bank_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.bank_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bank_slip_no">{{ trans('cruds.payment.fields.bank_slip_no') }}</label>
                <input class="form-control {{ $errors->has('bank_slip_no') ? 'is-invalid' : '' }}" type="text" name="bank_slip_no" id="bank_slip_no" value="{{ old('bank_slip_no', $payment->bank_slip_no) }}">
                @if($errors->has('bank_slip_no'))
                    <span class="text-danger">{{ $errors->first('bank_slip_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.bank_slip_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bank_payment_date">{{ trans('cruds.payment.fields.bank_payment_date') }}</label>
                <input class="form-control date {{ $errors->has('bank_payment_date') ? 'is-invalid' : '' }}" type="text" name="bank_payment_date" id="bank_payment_date" value="{{ old('bank_payment_date', $payment->bank_payment_date) }}">
                @if($errors->has('bank_payment_date'))
                    <span class="text-danger">{{ $errors->first('bank_payment_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.bank_payment_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="account_no_from">{{ trans('cruds.payment.fields.account_no_from') }}</label>
                <input class="form-control {{ $errors->has('account_no_from') ? 'is-invalid' : '' }}" type="text" name="account_no_from" id="account_no_from" value="{{ old('account_no_from', $payment->account_no_from) }}">
                @if($errors->has('account_no_from'))
                    <span class="text-danger">{{ $errors->first('account_no_from') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.account_no_from_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bank_name_to">{{ trans('cruds.payment.fields.bank_name_to') }}</label>
                <input class="form-control {{ $errors->has('bank_name_to') ? 'is-invalid' : '' }}" type="text" name="bank_name_to" id="bank_name_to" value="{{ old('bank_name_to', $payment->bank_name_to) }}">
                @if($errors->has('bank_name_to'))
                    <span class="text-danger">{{ $errors->first('bank_name_to') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.bank_name_to_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="account_no_to">{{ trans('cruds.payment.fields.account_no_to') }}</label>
                <input class="form-control {{ $errors->has('account_no_to') ? 'is-invalid' : '' }}" type="text" name="account_no_to" id="account_no_to" value="{{ old('account_no_to', $payment->account_no_to) }}">
                @if($errors->has('account_no_to'))
                    <span class="text-danger">{{ $errors->first('account_no_to') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.account_no_to_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="depositor_name">{{ trans('cruds.payment.fields.depositor_name') }}</label>
                <input class="form-control {{ $errors->has('depositor_name') ? 'is-invalid' : '' }}" type="text" name="depositor_name" id="depositor_name" value="{{ old('depositor_name', $payment->depositor_name) }}" required>
                @if($errors->has('depositor_name'))
                    <span class="text-danger">{{ $errors->first('depositor_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.depositor_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="depositor_cnic">{{ trans('cruds.payment.fields.depositor_cnic') }}</label>
                <input class="form-control {{ $errors->has('depositor_cnic') ? 'is-invalid' : '' }}" type="text" name="depositor_cnic" id="depositor_cnic" value="{{ old('depositor_cnic', $payment->depositor_cnic) }}" required>
                @if($errors->has('depositor_cnic'))
                    <span class="text-danger">{{ $errors->first('depositor_cnic') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.depositor_cnic_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="depositor_contact">{{ trans('cruds.payment.fields.depositor_contact') }}</label>
                <input class="form-control {{ $errors->has('depositor_contact') ? 'is-invalid' : '' }}" type="text" name="depositor_contact" id="depositor_contact" value="{{ old('depositor_contact', $payment->depositor_contact) }}" required>
                @if($errors->has('depositor_contact'))
                    <span class="text-danger">{{ $errors->first('depositor_contact') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.depositor_contact_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cachier_name">{{ trans('cruds.payment.fields.cachier_name') }}</label>
                <input class="form-control {{ $errors->has('cachier_name') ? 'is-invalid' : '' }}" type="text" name="cachier_name" id="cachier_name" value="{{ old('cachier_name', $payment->cachier_name) }}" required>
                @if($errors->has('cachier_name'))
                    <span class="text-danger">{{ $errors->first('cachier_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.cachier_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cashier_cnic">{{ trans('cruds.payment.fields.cashier_cnic') }}</label>
                <input class="form-control {{ $errors->has('cashier_cnic') ? 'is-invalid' : '' }}" type="text" name="cashier_cnic" id="cashier_cnic" value="{{ old('cashier_cnic', $payment->cashier_cnic) }}">
                @if($errors->has('cashier_cnic'))
                    <span class="text-danger">{{ $errors->first('cashier_cnic') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.cashier_cnic_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="created_by_id">{{ trans('cruds.payment.fields.created_by') }}</label>
                <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by_id" id="created_by_id" required>
                    @foreach($created_bies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('created_by_id') ? old('created_by_id') : $payment->created_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('created_by'))
                    <span class="text-danger">{{ $errors->first('created_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.created_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.payment.fields.remarks') }}</label>
                <textarea class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" name="remarks" id="remarks">{{ old('remarks', $payment->remarks) }}</textarea>
                @if($errors->has('remarks'))
                    <span class="text-danger">{{ $errors->first('remarks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.remarks_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="installment_id">{{ trans('cruds.payment.fields.installment') }}</label>
                <select class="form-control select2 {{ $errors->has('installment') ? 'is-invalid' : '' }}" name="installment_id" id="installment_id">
                    @foreach($installments as $id => $entry)
                        <option value="{{ $id }}" {{ (old('installment_id') ? old('installment_id') : $payment->installment->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('installment'))
                    <span class="text-danger">{{ $errors->first('installment') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.installment_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cheque_no">{{ trans('cruds.payment.fields.cheque_no') }}</label>
                <input class="form-control {{ $errors->has('cheque_no') ? 'is-invalid' : '' }}" type="text" name="cheque_no" id="cheque_no" value="{{ old('cheque_no', $payment->cheque_no) }}">
                @if($errors->has('cheque_no'))
                    <span class="text-danger">{{ $errors->first('cheque_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.cheque_no_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection