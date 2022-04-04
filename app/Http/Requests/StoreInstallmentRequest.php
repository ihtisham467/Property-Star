<?php

namespace App\Http\Requests;

use App\Models\Installment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInstallmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('installment_create');
    }

    public function rules()
    {
        return [
            'application_id' => [
                'required',
                'integer',
            ],
            'due_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'amount' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
