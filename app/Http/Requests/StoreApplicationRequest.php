<?php

namespace App\Http\Requests;

use App\Models\Application;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('application_create');
    }

    public function rules()
    {
        return [
            'form_no' => [
                'string',
                'required',
            ],
            'client_id' => [
                'required',
                'integer',
            ],
            'plot_id' => [
                'required',
                'integer',
            ],
            'discount' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total_after_discount' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'payment_type' => [
                'required',
            ],
            'no_of_installments' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'dealer_amount' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
