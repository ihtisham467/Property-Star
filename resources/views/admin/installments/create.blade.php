@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.installment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.installments.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="application_id">{{ trans('cruds.installment.fields.application') }}</label>
                <select class="form-control select2 {{ $errors->has('application') ? 'is-invalid' : '' }}" name="application_id" id="application_id" required>
                    @foreach($applications as $id => $entry)
                        <option value="{{ $id }}" {{ old('application_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('application'))
                    <span class="text-danger">{{ $errors->first('application') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.installment.fields.application_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="due_date">{{ trans('cruds.installment.fields.due_date') }}</label>
                <input class="form-control date {{ $errors->has('due_date') ? 'is-invalid' : '' }}" type="text" name="due_date" id="due_date" value="{{ old('due_date') }}" required>
                @if($errors->has('due_date'))
                    <span class="text-danger">{{ $errors->first('due_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.installment.fields.due_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.installment.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="1" required>
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.installment.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comments">{{ trans('cruds.installment.fields.comments') }}</label>
                <textarea class="form-control {{ $errors->has('comments') ? 'is-invalid' : '' }}" name="comments" id="comments">{{ old('comments') }}</textarea>
                @if($errors->has('comments'))
                    <span class="text-danger">{{ $errors->first('comments') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.installment.fields.comments_helper') }}</span>
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