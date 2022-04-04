@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.province.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.provinces.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.id') }}
                        </th>
                        <td>
                            {{ $province->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.country') }}
                        </th>
                        <td>
                            {{ $province->country->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.province.fields.name') }}
                        </th>
                        <td>
                            {{ $province->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.provinces.index') }}">
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
            <a class="nav-link" href="#province_cities" role="tab" data-toggle="tab">
                {{ trans('cruds.city.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#province_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="province_cities">
            @includeIf('admin.provinces.relationships.provinceCities', ['cities' => $province->provinceCities])
        </div>
        <div class="tab-pane" role="tabpanel" id="province_users">
            @includeIf('admin.provinces.relationships.provinceUsers', ['users' => $province->provinceUsers])
        </div>
    </div>
</div>

@endsection