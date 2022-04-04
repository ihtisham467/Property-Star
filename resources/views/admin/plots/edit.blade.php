@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.plot.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.plots.update", [$plot->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="plotid" class="required">{{ trans('cruds.plot.fields.plotid') }}</label>
                <input class="form-control {{ $errors->has('plotid') ? 'is-invalid' : '' }}" type="text" name="plotid" id="plotid" value="{{ old('plotid', $plot->plotid) }}" required>
                @if($errors->has('plotid'))
                    <span class="text-danger">{{ $errors->first('plotid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plot.fields.plotid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="latitude">{{ trans('cruds.plot.fields.latitude') }}</label>
                <input class="form-control {{ $errors->has('latitude') ? 'is-invalid' : '' }}" type="text" name="latitude" id="latitude" value="{{ old('latitude', $plot->latitude) }}">
                @if($errors->has('latitude'))
                    <span class="text-danger">{{ $errors->first('latitude') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plot.fields.latitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="longitude">{{ trans('cruds.plot.fields.longitude') }}</label>
                <input class="form-control {{ $errors->has('longitude') ? 'is-invalid' : '' }}" type="text" name="longitude" id="longitude" value="{{ old('longitude', $plot->longitude) }}">
                @if($errors->has('longitude'))
                    <span class="text-danger">{{ $errors->first('longitude') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plot.fields.longitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="area">{{ trans('cruds.plot.fields.area') }}</label>
                <input class="form-control {{ $errors->has('area') ? 'is-invalid' : '' }}" type="text" name="area" id="area" value="{{ old('area', $plot->area) }}">
                @if($errors->has('area'))
                    <span class="text-danger">{{ $errors->first('area') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plot.fields.area_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sector">{{ trans('cruds.plot.fields.sector') }}</label>
                <input class="form-control {{ $errors->has('sector') ? 'is-invalid' : '' }}" type="text" name="sector" id="sector" value="{{ old('sector', $plot->sector) }}">
                @if($errors->has('sector'))
                    <span class="text-danger">{{ $errors->first('sector') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plot.fields.sector_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="block">{{ trans('cruds.plot.fields.block') }}</label>
                <input class="form-control {{ $errors->has('block') ? 'is-invalid' : '' }}" type="text" name="block" id="block" value="{{ old('block', $plot->block) }}">
                @if($errors->has('block'))
                    <span class="text-danger">{{ $errors->first('block') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plot.fields.block_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="city_id">{{ trans('cruds.plot.fields.city') }}</label>
                <select class="form-control select2 {{ $errors->has('city') ? 'is-invalid' : '' }}" name="city_id" id="city_id" required>
                    @foreach($cities as $id => $entry)
                        <option value="{{ $id }}" {{ (old('city_id') ? old('city_id') : $plot->city->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plot.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.plot.fields.plot_type') }}</label>
                <select class="form-control {{ $errors->has('plot_type') ? 'is-invalid' : '' }}" name="plot_type" id="plot_type" required>
                    <option value disabled {{ old('plot_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Plot::PLOT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('plot_type', $plot->plot_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('plot_type'))
                    <span class="text-danger">{{ $errors->first('plot_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plot.fields.plot_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="plot_type_other">{{ trans('cruds.plot.fields.plot_type_other') }}</label>
                <input class="form-control {{ $errors->has('plot_type_other') ? 'is-invalid' : '' }}" type="text" name="plot_type_other" id="plot_type_other" value="{{ old('plot_type_other', $plot->plot_type_other) }}">
                @if($errors->has('plot_type_other'))
                    <span class="text-danger">{{ $errors->first('plot_type_other') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plot.fields.plot_type_other_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.plot.fields.size') }}</label>
                <select class="form-control {{ $errors->has('size') ? 'is-invalid' : '' }}" name="size" id="size" required>
                    <option value disabled {{ old('size', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Plot::SIZE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('size', $plot->size) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('size'))
                    <span class="text-danger">{{ $errors->first('size') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plot.fields.size_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('boulevard') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="boulevard" value="0">
                    <input class="form-check-input" type="checkbox" name="boulevard" id="boulevard" value="1" {{ $plot->boulevard || old('boulevard', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="boulevard">{{ trans('cruds.plot.fields.boulevard') }}</label>
                </div>
                @if($errors->has('boulevard'))
                    <span class="text-danger">{{ $errors->first('boulevard') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plot.fields.boulevard_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('main_road') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="main_road" value="0">
                    <input class="form-check-input" type="checkbox" name="main_road" id="main_road" value="1" {{ $plot->main_road || old('main_road', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="main_road">{{ trans('cruds.plot.fields.main_road') }}</label>
                </div>
                @if($errors->has('main_road'))
                    <span class="text-danger">{{ $errors->first('main_road') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plot.fields.main_road_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('facing_park') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="facing_park" value="0">
                    <input class="form-check-input" type="checkbox" name="facing_park" id="facing_park" value="1" {{ $plot->facing_park || old('facing_park', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="facing_park">{{ trans('cruds.plot.fields.facing_park') }}</label>
                </div>
                @if($errors->has('facing_park'))
                    <span class="text-danger">{{ $errors->first('facing_park') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plot.fields.facing_park_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('corner') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="corner" value="0">
                    <input class="form-check-input" type="checkbox" name="corner" id="corner" value="1" {{ $plot->corner || old('corner', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="corner">{{ trans('cruds.plot.fields.corner') }}</label>
                </div>
                @if($errors->has('corner'))
                    <span class="text-danger">{{ $errors->first('corner') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plot.fields.corner_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('twoor_more_sides_open') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="twoor_more_sides_open" value="0">
                    <input class="form-check-input" type="checkbox" name="twoor_more_sides_open" id="twoor_more_sides_open" value="1" {{ $plot->twoor_more_sides_open || old('twoor_more_sides_open', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="twoor_more_sides_open">{{ trans('cruds.plot.fields.twoor_more_sides_open') }}</label>
                </div>
                @if($errors->has('twoor_more_sides_open'))
                    <span class="text-danger">{{ $errors->first('twoor_more_sides_open') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plot.fields.twoor_more_sides_open_helper') }}</span>
            </div>
            {{-- <div class="form-group">
                <label for="prefred_choice">{{ trans('cruds.plot.fields.prefred_choice') }}</label>
                <input class="form-control {{ $errors->has('prefred_choice') ? 'is-invalid' : '' }}" type="text" name="prefred_choice" id="prefred_choice" value="{{ old('prefred_choice', $plot->prefred_choice) }}">
                @if($errors->has('prefred_choice'))
                    <span class="text-danger">{{ $errors->first('prefred_choice') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plot.fields.prefred_choice_helper') }}</span>
            </div> --}}
            <div class="form-group">
                <label class="required" for="price_per_marla">{{ trans('cruds.plot.fields.price_per_marla') }}</label>
                <input class="form-control {{ $errors->has('price_per_marla') ? 'is-invalid' : '' }}" type="number" name="price_per_marla" id="price_per_marla" value="{{ old('price_per_marla', $plot->price_per_marla) }}" step="1" required>
                @if($errors->has('price_per_marla'))
                    <span class="text-danger">{{ $errors->first('price_per_marla') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plot.fields.price_per_marla_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="land_charges">{{ trans('cruds.plot.fields.land_charges') }}</label>
                <input class="form-control {{ $errors->has('land_charges') ? 'is-invalid' : '' }}" type="number" name="land_charges" id="land_charges" value="{{ old('land_charges', $plot->land_charges) }}" step="1">
                @if($errors->has('land_charges'))
                    <span class="text-danger">{{ $errors->first('land_charges') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plot.fields.land_charges_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="development_charges">{{ trans('cruds.plot.fields.development_charges') }}</label>
                <input class="form-control {{ $errors->has('development_charges') ? 'is-invalid' : '' }}" type="number" name="development_charges" id="development_charges" value="{{ old('development_charges', $plot->development_charges) }}" step="1">
                @if($errors->has('development_charges'))
                    <span class="text-danger">{{ $errors->first('development_charges') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plot.fields.development_charges_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_price">{{ trans('cruds.plot.fields.total_price') }}</label>
                <input class="form-control {{ $errors->has('total_price') ? 'is-invalid' : '' }}" type="number" name="total_price" id="total_price" value="{{ old('total_price', $plot->total_price) }}" step="1">
                @if($errors->has('total_price'))
                    <span class="text-danger">{{ $errors->first('total_price') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plot.fields.total_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comments">{{ trans('cruds.plot.fields.comments') }}</label>
                <textarea class="form-control {{ $errors->has('comments') ? 'is-invalid' : '' }}" name="comments" id="comments">{{ old('comments', $plot->comments) }}</textarea>
                @if($errors->has('comments'))
                    <span class="text-danger">{{ $errors->first('comments') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.plot.fields.comments_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection