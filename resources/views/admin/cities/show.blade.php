@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.city.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.city.fields.id') }}
                        </th>
                        <td>
                            {{ $city->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.city.fields.province') }}
                        </th>
                        <td>
                            {{ $city->province->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.city.fields.name') }}
                        </th>
                        <td>
                            {{ $city->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cities.index') }}">
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
            <a class="nav-link" href="#city_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#city_dealers" role="tab" data-toggle="tab">
                {{ trans('cruds.dealer.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#city_plots" role="tab" data-toggle="tab">
                {{ trans('cruds.plot.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#city_clients" role="tab" data-toggle="tab">
                {{ trans('cruds.client.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="city_users">
            @includeIf('admin.cities.relationships.cityUsers', ['users' => $city->cityUsers])
        </div>
        <div class="tab-pane" role="tabpanel" id="city_dealers">
            @includeIf('admin.cities.relationships.cityDealers', ['dealers' => $city->cityDealers])
        </div>
        <div class="tab-pane" role="tabpanel" id="city_plots">
            @includeIf('admin.cities.relationships.cityPlots', ['plots' => $city->cityPlots])
        </div>
        <div class="tab-pane" role="tabpanel" id="city_clients">
            @includeIf('admin.cities.relationships.cityClients', ['clients' => $city->cityClients])
        </div>
    </div>
</div>

@endsection