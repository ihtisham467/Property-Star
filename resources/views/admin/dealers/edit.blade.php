@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.dealer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.dealers.update", [$dealer->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.dealer.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $dealer->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dealer.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="father_name">{{ trans('cruds.dealer.fields.father_name') }}</label>
                <input class="form-control {{ $errors->has('father_name') ? 'is-invalid' : '' }}" type="text" name="father_name" id="father_name" value="{{ old('father_name', $dealer->father_name) }}" required>
                @if($errors->has('father_name'))
                    <span class="text-danger">{{ $errors->first('father_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dealer.fields.father_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.dealer.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $dealer->phone) }}" required>
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dealer.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cnic">{{ trans('cruds.dealer.fields.cnic') }}</label>
                <input class="form-control {{ $errors->has('cnic') ? 'is-invalid' : '' }}" type="text" name="cnic" id="cnic" value="{{ old('cnic', $dealer->cnic) }}" required>
                @if($errors->has('cnic'))
                    <span class="text-danger">{{ $errors->first('cnic') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dealer.fields.cnic_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="city_id">{{ trans('cruds.dealer.fields.city') }}</label>
                <select class="form-control select2 {{ $errors->has('city') ? 'is-invalid' : '' }}" name="city_id" id="city_id">
                    @foreach($cities as $id => $entry)
                        <option value="{{ $id }}" {{ (old('city_id') ? old('city_id') : $dealer->city->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dealer.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dob">{{ trans('cruds.dealer.fields.dob') }}</label>
                <input class="form-control date {{ $errors->has('dob') ? 'is-invalid' : '' }}" type="text" name="dob" id="dob" value="{{ old('dob', $dealer->dob) }}">
                @if($errors->has('dob'))
                    <span class="text-danger">{{ $errors->first('dob') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dealer.fields.dob_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="doj">{{ trans('cruds.dealer.fields.doj') }}</label>
                <input class="form-control date {{ $errors->has('doj') ? 'is-invalid' : '' }}" type="text" name="doj" id="doj" value="{{ old('doj', $dealer->doj) }}" required>
                @if($errors->has('doj'))
                    <span class="text-danger">{{ $errors->first('doj') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dealer.fields.doj_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">Gender</label>
                <select class="form-control" name="gender" required>
                    <option value="Male" {{ $dealer->gender == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $dealer->gender == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ $dealer->gender == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="referred_by">{{ trans('cruds.dealer.fields.referred_by') }}</label>
                <input class="form-control {{ $errors->has('referred_by') ? 'is-invalid' : '' }}" type="text" name="referred_by" id="referred_by" value="{{ old('referred_by', $dealer->referred_by) }}">
                @if($errors->has('referred_by'))
                    <span class="text-danger">{{ $errors->first('referred_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dealer.fields.referred_by_helper') }}</span>
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