<?php

namespace App\Http\Requests;

use App\Models\Dealer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDealerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dealer_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'father_name' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'cnic' => [
                'string',
                'required',
            ],
            'dob' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'doj' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'gender' => [
                'string',
                'required',
            ],
            'referred_by' => [
                'string',
                'nullable',
            ],
        ];
    }
}
