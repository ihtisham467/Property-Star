@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.plot.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.plots.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.plot.fields.id') }}
                        </th>
                        <td>
                            {{ $plot->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plot.fields.plotid') }}
                        </th>
                        <td>
                            {{ $plot->plotid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plot.fields.latitude') }}
                        </th>
                        <td>
                            {{ $plot->latitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plot.fields.longitude') }}
                        </th>
                        <td>
                            {{ $plot->longitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plot.fields.area') }}
                        </th>
                        <td>
                            {{ $plot->area }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plot.fields.sector') }}
                        </th>
                        <td>
                            {{ $plot->sector }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plot.fields.block') }}
                        </th>
                        <td>
                            {{ $plot->block }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plot.fields.city') }}
                        </th>
                        <td>
                            {{ $plot->city->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plot.fields.plot_type') }}
                        </th>
                        <td>
                            {{ App\Models\Plot::PLOT_TYPE_SELECT[$plot->plot_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plot.fields.plot_type_other') }}
                        </th>
                        <td>
                            {{ $plot->plot_type_other }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plot.fields.size') }}
                        </th>
                        <td>
                            {{ App\Models\Plot::SIZE_SELECT[$plot->size] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plot.fields.boulevard') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $plot->boulevard ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plot.fields.main_road') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $plot->main_road ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plot.fields.facing_park') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $plot->facing_park ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plot.fields.corner') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $plot->corner ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plot.fields.twoor_more_sides_open') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $plot->twoor_more_sides_open ? 'checked' : '' }}>
                        </td>
                    </tr>
                    {{-- <tr>
                        <th>
                            {{ trans('cruds.plot.fields.prefred_choice') }}
                        </th>
                        <td>
                            {{ $plot->prefred_choice }}
                        </td>
                    </tr> --}}
                    <tr>
                        <th>
                            {{ trans('cruds.plot.fields.price_per_marla') }}
                        </th>
                        <td>
                            {{ $plot->price_per_marla }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plot.fields.land_charges') }}
                        </th>
                        <td>
                            {{ $plot->land_charges }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plot.fields.development_charges') }}
                        </th>
                        <td>
                            {{ $plot->development_charges }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plot.fields.total_price') }}
                        </th>
                        <td>
                            {{ $plot->total_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plot.fields.comments') }}
                        </th>
                        <td>
                            {{ $plot->comments }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.plots.index') }}">
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
            <a class="nav-link" href="#plot_applications" role="tab" data-toggle="tab">
                {{ trans('cruds.application.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="plot_applications">
            @includeIf('admin.plots.relationships.plotApplications', ['applications' => $plot->plotApplications])
        </div>
    </div>
</div>

@endsection