<?php

namespace App\Http\Requests;

use App\Models\Client;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_create');
    }

    public function rules()
    {
        return [
            'clientid' => [
                'string',
                'nullable',
            ],
            'membership_no' => [
                'string',
                'required',
            ],
            'date_of_membership' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'name' => [
                'string',
                'required',
            ],
            'cnic_nicop_no' => [
                'string',
                'required',
            ],
            'passport_no' => [
                'string',
                'nullable',
            ],
            'father_name' => [
                'string',
                'nullable',
            ],
            'profession' => [
                'string',
                'nullable',
            ],
            'spouse_name' => [
                'string',
                'nullable',
            ],
            'spouse_profession' => [
                'string',
                'nullable',
            ],
            'education' => [
                'string',
                'nullable',
            ],
            'nationality' => [
                'string',
                'required',
            ],
            'religion' => [
                'string',
                'required',
            ],
            'resident_villa_no' => [
                'string',
                'nullable',
            ],
            'street_no' => [
                'string',
                'nullable',
            ],
            'sector' => [
                'string',
                'nullable',
            ],
            'city_id' => [
                'required',
                'integer',
            ],
            'date_of_birth' => [
                'string',
                'nullable',
            ],
            'marital_status' => [
                'string',
                'required',
            ],
            'present_address' => [
                'string',
                'nullable',
            ],
            'office_contact' => [
                'string',
                'nullable',
            ],
            'home_contact' => [
                'string',
                'nullable',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'fax' => [
                'string',
                'nullable',
            ],
            'permanent_address' => [
                'string',
                'required',
            ],
            'domicile' => [
                'string',
                'nullable',
            ],
            'next_of_kin' => [
                'string',
                'required',
            ],
            'relation_kin' => [
                'string',
                'required',
            ],
            'cnic_ni_cop_kin_no' => [
                'string',
                'required',
            ],
            'passport_no_kin' => [
                'string',
                'nullable',
            ],
            'referred_by' => [
                'string',
                'nullable',
            ],
        ];
    }
}
