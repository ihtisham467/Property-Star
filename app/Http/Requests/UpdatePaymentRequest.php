<?php

namespace App\Http\Requests;

use App\Models\Payment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('payment_edit');
    }

    public function rules()
    {
        return [
            'application_id' => [
                'required',
                'integer',
            ],
            'challan_no' => [
                'string',
                'required',
            ],
            'payment_mode' => [
                'required',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'amount' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'payment_type' => [
                'required',
            ],
            'payment_medium' => [
                'required',
            ],
            'bank_name' => [
                'string',
                'nullable',
            ],
            'bank_slip_no' => [
                'string',
                'nullable',
            ],
            'bank_payment_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'account_no_from' => [
                'string',
                'nullable',
            ],
            'bank_name_to' => [
                'string',
                'nullable',
            ],
            'account_no_to' => [
                'string',
                'nullable',
            ],
            'depositor_name' => [
                'string',
                'required',
            ],
            'depositor_cnic' => [
                'string',
                'required',
            ],
            'depositor_contact' => [
                'string',
                'required',
            ],
            'cachier_name' => [
                'string',
                'required',
            ],
            'cashier_cnic' => [
                'string',
                'nullable',
            ],
            'created_by_id' => [
                'required',
                'integer',
            ],
            'cheque_no' => [
                'string',
                'nullable',
            ],
        ];
    }
}
