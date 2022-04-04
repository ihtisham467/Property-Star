@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.dealer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dealers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.dealer.fields.id') }}
                        </th>
                        <td>
                            {{ $dealer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealer.fields.name') }}
                        </th>
                        <td>
                            {{ $dealer->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealer.fields.father_name') }}
                        </th>
                        <td>
                            {{ $dealer->father_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealer.fields.phone') }}
                        </th>
                        <td>
                            {{ $dealer->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealer.fields.cnic') }}
                        </th>
                        <td>
                            {{ $dealer->cnic }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealer.fields.city') }}
                        </th>
                        <td>
                            {{ $dealer->city->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealer.fields.dob') }}
                        </th>
                        <td>
                            {{ $dealer->dob }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealer.fields.doj') }}
                        </th>
                        <td>
                            {{ $dealer->doj }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealer.fields.gender') }}
                        </th>
                        <td>
                            {{ $dealer->gender }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dealer.fields.referred_by') }}
                        </th>
                        <td>
                            {{ $dealer->referred_by }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dealers.index') }}">
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
            <a class="nav-link" href="#dealer_applications" role="tab" data-toggle="tab">
                {{ trans('cruds.application.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="dealer_applications">
            @includeIf('admin.dealers.relationships.dealerApplications', ['applications' => $dealer->dealerApplications])
        </div>
    </div>
</div>

@endsection