<?php

namespace App\Http\Requests;

use App\Models\Plot;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePlotRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('plot_edit');
    }

    public function rules()
    {
        return [
            'plotid' => [
                'string',
                'nullable',
            ],
            'latitude' => [
                'string',
                'nullable',
            ],
            'longitude' => [
                'string',
                'nullable',
            ],
            'area' => [
                'string',
                'nullable',
            ],
            'sector' => [
                'string',
                'nullable',
            ],
            'block' => [
                'string',
                'nullable',
            ],
            'city_id' => [
                'required',
                'integer',
            ],
            'plot_type' => [
                'required',
            ],
            'plot_type_other' => [
                'string',
                'nullable',
            ],
            'size' => [
                'required',
            ],
            'prefred_choice' => [
                'string',
                'nullable',
            ],
            'price_per_marla' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total_price' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'land_charges' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'development_charges' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
