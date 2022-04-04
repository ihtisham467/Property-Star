@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.client.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clients.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    {{-- <tr>
                        <th>
                            {{ trans('cruds.client.fields.id') }}
                        </th>
                        <td>
                            {{ $client->id }}
                        </td>
                    </tr> --}}
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.clientid') }}
                        </th>
                        <td>
                            {{ $client->clientid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.membership_no') }}
                        </th>
                        <td>
                            {{ $client->membership_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.date_of_membership') }}
                        </th>
                        <td>
                            {{ $client->date_of_membership }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.name') }}
                        </th>
                        <td>
                            {{ $client->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.cnic_nicop_no') }}
                        </th>
                        <td>
                            {{ $client->cnic_nicop_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.passport_no') }}
                        </th>
                        <td>
                            {{ $client->passport_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.father_name') }}
                        </th>
                        <td>
                            {{ $client->father_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.profession') }}
                        </th>
                        <td>
                            {{ $client->profession }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.spouse_name') }}
                        </th>
                        <td>
                            {{ $client->spouse_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.spouse_profession') }}
                        </th>
                        <td>
                            {{ $client->spouse_profession }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.education') }}
                        </th>
                        <td>
                            {{ $client->education }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.nationality') }}
                        </th>
                        <td>
                            {{ $client->nationality }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.religion') }}
                        </th>
                        <td>
                            {{ $client->religion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.resident_villa_no') }}
                        </th>
                        <td>
                            {{ $client->resident_villa_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.street_no') }}
                        </th>
                        <td>
                            {{ $client->street_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.sector') }}
                        </th>
                        <td>
                            {{ $client->sector }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.city') }}
                        </th>
                        <td>
                            {{ $client->city->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.date_of_birth') }}
                        </th>
                        <td>
                            {{ $client->date_of_birth }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.marital_status') }}
                        </th>
                        <td>
                            {{ $client->marital_status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.present_address') }}
                        </th>
                        <td>
                            {{ $client->present_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.office_contact') }}
                        </th>
                        <td>
                            {{ $client->office_contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.home_contact') }}
                        </th>
                        <td>
                            {{ $client->home_contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.phone') }}
                        </th>
                        <td>
                            {{ $client->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.fax') }}
                        </th>
                        <td>
                            {{ $client->fax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.email') }}
                        </th>
                        <td>
                            {{ $client->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.permanent_address') }}
                        </th>
                        <td>
                            {{ $client->permanent_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.domicile') }}
                        </th>
                        <td>
                            {{ $client->domicile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.next_of_kin') }}
                        </th>
                        <td>
                            {{ $client->next_of_kin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.relation_kin') }}
                        </th>
                        <td>
                            {{ $client->relation_kin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.cnic_ni_cop_kin_no') }}
                        </th>
                        <td>
                            {{ $client->cnic_ni_cop_kin_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.passport_no_kin') }}
                        </th>
                        <td>
                            {{ $client->passport_no_kin }}
                        </td>
                    </tr>
                    {{-- <tr>
                        <th>
                            {{ trans('cruds.client.fields.picture') }}
                        </th>
                        <td>
                            @if($client->picture)
                                <a href="{{ $client->picture->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $client->picture->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.cnic_pic') }}
                        </th>
                        <td>
                            @if($client->cnic_pic)
                                <a href="{{ $client->cnic_pic->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $client->cnic_pic->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.signature') }}
                        </th>
                        <td>
                            @if($client->signature)
                                <a href="{{ $client->signature->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $client->signature->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.thumb') }}
                        </th>
                        <td>
                            @if($client->thumb)
                                <a href="{{ $client->thumb->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $client->thumb->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr> --}}
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.referred_by') }}
                        </th>
                        <td>
                            {{ $client->referred_by }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clients.index') }}">
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
            <a class="nav-link" href="#client_applications" role="tab" data-toggle="tab">
                {{ trans('cruds.application.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="client_applications">
            @includeIf('admin.clients.relationships.clientApplications', ['applications' => $client->clientApplications])
        </div>
    </div>
</div>

@endsection