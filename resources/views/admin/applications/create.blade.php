@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.application.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.applications.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="form_no">{{ trans('cruds.application.fields.form_no') }}</label>
                <input class="form-control {{ $errors->has('form_no') ? 'is-invalid' : '' }}" type="text" name="form_no" id="form_no" value="{{ old('form_no', '') }}" placeholder="01-ISB" required>
                @if($errors->has('form_no'))
                    <span class="text-danger">{{ $errors->first('form_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.form_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="client_id">{{ trans('cruds.application.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id" required>
                    @foreach($clients as $id => $entry)
                        <option value="{{ $id }}" {{ old('client_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <span class="text-danger">{{ $errors->first('client') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.client_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="plot_id">{{ trans('cruds.application.fields.plot') }}</label>
                <select class="form-control select2 plot_id {{ $errors->has('plot') ? 'is-invalid' : '' }}" name="plot_id" id="plot_id" required>
                    <option value="">-</option>
                    @foreach($plots as $plot)
                        <option value="{{ $plot->id }}" {{ old('plot_id') == $id ? 'selected' : '' }}>{{ $plot->plotid }} -- {{ $plot->plot_type }} ({{ $plot->boulevard == 1 ? 'Boulevard' : '' }}, {{ $plot->main_road == 1 ? 'Main Road' : '' }}, {{ $plot->facing_park == 1 ? 'Facing Park' : '' }}, {{ $plot->corner == 1 ? 'Corner' : '' }}, {{ $plot->twoor_more_sides_open == 1 ? 'Two Or More Sides Open' : '' }})</option>
                    @endforeach
                </select>
                @if($errors->has('plot'))
                    <span class="text-danger">{{ $errors->first('plot') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.plot_helper') }}</span>
            </div>
            {{-- Hidden Inputs --}}
            @foreach($plots as $p)
                <input type="hidden" value="{{ $p->total_price }}" id="plot{{ $p->id }}">
            @endforeach
            <div class="form-group">
                <label for="dealer_id">{{ trans('cruds.application.fields.dealer') }}</label>
                <select class="form-control select2 {{ $errors->has('dealer') ? 'is-invalid' : '' }}" name="dealer_id" id="dealer_id">
                    @foreach($dealers as $id => $entry)
                        <option value="{{ $id }}" {{ old('dealer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('dealer'))
                    <span class="text-danger">{{ $errors->first('dealer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.dealer_helper') }}</span>
            </div>
            <div class="form-group" id="dealer_block" style="display:none;">
                <label for="dealer_amount">Dealer Amount</label>
                <input type="number" class="form-control" name="dealer_amount" value="0" id="dealer_amount">
            </div>
            <div class="form-group">
                <label class="required" for="discount">{{ trans('cruds.application.fields.discount') }} (%)</label>
                <input class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}" type="number" name="discount" id="discount" value="{{ old('discount', '0') }}" step="1" required>
                @if($errors->has('discount'))
                    <span class="text-danger">{{ $errors->first('discount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.discount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_after_discount">{{ trans('cruds.application.fields.total_after_discount') }}</label>
                <input class="form-control {{ $errors->has('total_after_discount') ? 'is-invalid' : '' }}" type="number" name="total_after_discount" id="total_after_discount" value="{{ old('total_after_discount', '') }}" step="1">
                @if($errors->has('total_after_discount'))
                    <span class="text-danger">{{ $errors->first('total_after_discount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.total_after_discount_helper') }}</span>
            </div>
            
            <div class="form-group">
                <label class="required">{{ trans('cruds.application.fields.payment_type') }}</label>
                <select class="form-control {{ $errors->has('payment_type') ? 'is-invalid' : '' }}" name="payment_type" id="payment_type" required>
                    <option value disabled {{ old('payment_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Application::PAYMENT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_type'))
                    <span class="text-danger">{{ $errors->first('payment_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.payment_type_helper') }}</span>
            </div>
            <div class="form-group installments_block" style="display: none;">
                <label for="no_of_installments">{{ trans('cruds.application.fields.no_of_installments') }}</label>
                <input class="form-control {{ $errors->has('no_of_installments') ? 'is-invalid' : '' }}" type="number" name="no_of_installments" id="no_of_installments" value="{{ old('no_of_installments', '') }}" step="1">
                @if($errors->has('no_of_installments'))
                    <span class="text-danger">{{ $errors->first('no_of_installments') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.no_of_installments_helper') }}</span>
            </div>
            <div class="form-group installments_block" style="display: none;">
                <label>{{ trans('cruds.application.fields.installments_period') }}</label>
                <select class="form-control {{ $errors->has('installments_period') ? 'is-invalid' : '' }}" name="installments_period" id="installments_period">
                    <option value disabled {{ old('installments_period', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Application::INSTALLMENTS_PERIOD_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('installments_period', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('installments_period'))
                    <span class="text-danger">{{ $errors->first('installments_period') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.installments_period_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comments">{{ trans('cruds.application.fields.comments') }}</label>
                <textarea class="form-control {{ $errors->has('comments') ? 'is-invalid' : '' }}" name="comments" id="comments">{{ old('comments') }}</textarea>
                @if($errors->has('comments'))
                    <span class="text-danger">{{ $errors->first('comments') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.comments_helper') }}</span>
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
@section('scripts')
<script>
    $("#plot_id").change(function(){
        var plot_amount = $('#plot'+$('#plot_id').val()).val();

        var discount = $('#discount').val();
        var total = plot_amount;
        var after = (discount*total/100);

        var dealer_amount = $('#dealer_amount').val();
        $('#total_after_discount').val(parseInt(total-after)+parseInt(dealer_amount));
    });
    $("#discount, #dealer_amount").keyup(function(){
        var plot_amount = $('#plot'+$('#plot_id').val()).val();

        var discount = $('#discount').val();
        var total = plot_amount;
        var after = (discount*total/100);

        var dealer_amount = $('#dealer_amount').val();
        $('#total_after_discount').val(parseInt(total-after)+parseInt(dealer_amount));
    });

    $("#dealer_id").change(function(){
        var dealer = $('#dealer_id').val();
        if(dealer === '') {
            $('#dealer_block').hide();
        } else {
            $('#dealer_block').show();
        }
    });

    $('#payment_type').change(function() {
        var payment_type = $('#payment_type').val();
        if(payment_type == 'Installments') {
            $('.installments_block').show();
        } else {
            $('.installments_block').hide();
        }
    })

    
</script>
@endsection