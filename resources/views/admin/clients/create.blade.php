@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.client.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.clients.store") }}" enctype="multipart/form-data">
            @csrf
            {{-- <div class="form-group">
                <label for="clientid">{{ trans('cruds.client.fields.clientid') }}</label>
                <input class="form-control {{ $errors->has('clientid') ? 'is-invalid' : '' }}" type="text" name="clientid" id="clientid" value="{{ old('clientid', '') }}" placeholder="ISB-1">
                @if($errors->has('clientid'))
                    <span class="text-danger">{{ $errors->first('clientid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.clientid_helper') }}</span>
            </div> --}}
            <div class="form-group">
                <label class="required" for="membership_no">{{ trans('cruds.client.fields.membership_no') }}</label>
                <input class="form-control {{ $errors->has('membership_no') ? 'is-invalid' : '' }}" type="text" name="membership_no" id="membership_no" value="{{ old('membership_no', '') }}" placeholder="ISB-1" required>
                @if($errors->has('membership_no'))
                    <span class="text-danger">{{ $errors->first('membership_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.membership_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_of_membership">{{ trans('cruds.client.fields.date_of_membership') }}</label>
                <input class="form-control date {{ $errors->has('date_of_membership') ? 'is-invalid' : '' }}" type="text" name="date_of_membership" id="date_of_membership" value="{{ old('date_of_membership') }}" required>
                @if($errors->has('date_of_membership'))
                    <span class="text-danger">{{ $errors->first('date_of_membership') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.date_of_membership_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.client.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cnic_nicop_no">{{ trans('cruds.client.fields.cnic_nicop_no') }}</label>
                <input class="form-control {{ $errors->has('cnic_nicop_no') ? 'is-invalid' : '' }}" type="text" name="cnic_nicop_no" id="cnic_nicop_no" value="{{ old('cnic_nicop_no', '') }}" required>
                @if($errors->has('cnic_nicop_no'))
                    <span class="text-danger">{{ $errors->first('cnic_nicop_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.cnic_nicop_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="passport_no">{{ trans('cruds.client.fields.passport_no') }}</label>
                <input class="form-control {{ $errors->has('passport_no') ? 'is-invalid' : '' }}" type="text" name="passport_no" id="passport_no" value="{{ old('passport_no', '') }}">
                @if($errors->has('passport_no'))
                    <span class="text-danger">{{ $errors->first('passport_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.passport_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="father_name">{{ trans('cruds.client.fields.father_name') }}</label>
                <input class="form-control {{ $errors->has('father_name') ? 'is-invalid' : '' }}" type="text" name="father_name" id="father_name" value="{{ old('father_name', '') }}">
                @if($errors->has('father_name'))
                    <span class="text-danger">{{ $errors->first('father_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.father_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="profession">{{ trans('cruds.client.fields.profession') }}</label>
                <input class="form-control {{ $errors->has('profession') ? 'is-invalid' : '' }}" type="text" name="profession" id="profession" value="{{ old('profession', '') }}">
                @if($errors->has('profession'))
                    <span class="text-danger">{{ $errors->first('profession') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.profession_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="spouse_name">{{ trans('cruds.client.fields.spouse_name') }}</label>
                <input class="form-control {{ $errors->has('spouse_name') ? 'is-invalid' : '' }}" type="text" name="spouse_name" id="spouse_name" value="{{ old('spouse_name', '') }}">
                @if($errors->has('spouse_name'))
                    <span class="text-danger">{{ $errors->first('spouse_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.spouse_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="spouse_profession">{{ trans('cruds.client.fields.spouse_profession') }}</label>
                <input class="form-control {{ $errors->has('spouse_profession') ? 'is-invalid' : '' }}" type="text" name="spouse_profession" id="spouse_profession" value="{{ old('spouse_profession', '') }}">
                @if($errors->has('spouse_profession'))
                    <span class="text-danger">{{ $errors->first('spouse_profession') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.spouse_profession_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="education">{{ trans('cruds.client.fields.education') }}</label>
                <input class="form-control {{ $errors->has('education') ? 'is-invalid' : '' }}" type="text" name="education" id="education" value="{{ old('education', '') }}">
                @if($errors->has('education'))
                    <span class="text-danger">{{ $errors->first('education') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.education_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nationality">{{ trans('cruds.client.fields.nationality') }}</label>
                <input class="form-control {{ $errors->has('nationality') ? 'is-invalid' : '' }}" type="text" name="nationality" id="nationality" value="{{ old('nationality', '') }}" required>
                @if($errors->has('nationality'))
                    <span class="text-danger">{{ $errors->first('nationality') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.nationality_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="religion">{{ trans('cruds.client.fields.religion') }}</label>
                <input class="form-control {{ $errors->has('religion') ? 'is-invalid' : '' }}" type="text" name="religion" id="religion" value="{{ old('religion', '') }}" required>
                @if($errors->has('religion'))
                    <span class="text-danger">{{ $errors->first('religion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.religion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="resident_villa_no">{{ trans('cruds.client.fields.resident_villa_no') }}</label>
                <input class="form-control {{ $errors->has('resident_villa_no') ? 'is-invalid' : '' }}" type="text" name="resident_villa_no" id="resident_villa_no" value="{{ old('resident_villa_no', '') }}">
                @if($errors->has('resident_villa_no'))
                    <span class="text-danger">{{ $errors->first('resident_villa_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.resident_villa_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="street_no">{{ trans('cruds.client.fields.street_no') }}</label>
                <input class="form-control {{ $errors->has('street_no') ? 'is-invalid' : '' }}" type="text" name="street_no" id="street_no" value="{{ old('street_no', '') }}">
                @if($errors->has('street_no'))
                    <span class="text-danger">{{ $errors->first('street_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.street_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sector">{{ trans('cruds.client.fields.sector') }}</label>
                <input class="form-control {{ $errors->has('sector') ? 'is-invalid' : '' }}" type="text" name="sector" id="sector" value="{{ old('sector', '') }}">
                @if($errors->has('sector'))
                    <span class="text-danger">{{ $errors->first('sector') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.sector_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="city_id">{{ trans('cruds.client.fields.city') }}</label>
                <select class="form-control select2 {{ $errors->has('city') ? 'is-invalid' : '' }}" name="city_id" id="city_id" required>
                    @foreach($cities as $id => $entry)
                        <option value="{{ $id }}" {{ old('city_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_of_birth">{{ trans('cruds.client.fields.date_of_birth') }}</label>
                <input class="form-control {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}" type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', '') }}" required>
                @if($errors->has('date_of_birth'))
                    <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.date_of_birth_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">Marital Status</label>
                <select class="form-control" name="marital_status" required>
                    <option value="Married">Married</option>
                    <option value="Unmarried">Unmarried</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Seperated">Seperated</option>
                    <option value="Widowed">Widowed</option>
                </select>
            </div>
            <div class="form-group">
                <label for="present_address">{{ trans('cruds.client.fields.present_address') }}</label>
                <input class="form-control {{ $errors->has('present_address') ? 'is-invalid' : '' }}" type="text" name="present_address" id="present_address" value="{{ old('present_address', '') }}">
                @if($errors->has('present_address'))
                    <span class="text-danger">{{ $errors->first('present_address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.present_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="office_contact">{{ trans('cruds.client.fields.office_contact') }}</label>
                <input class="form-control {{ $errors->has('office_contact') ? 'is-invalid' : '' }}" type="text" name="office_contact" id="office_contact" value="{{ old('office_contact', '') }}">
                @if($errors->has('office_contact'))
                    <span class="text-danger">{{ $errors->first('office_contact') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.office_contact_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="home_contact">{{ trans('cruds.client.fields.home_contact') }}</label>
                <input class="form-control {{ $errors->has('home_contact') ? 'is-invalid' : '' }}" type="text" name="home_contact" id="home_contact" value="{{ old('home_contact', '') }}">
                @if($errors->has('home_contact'))
                    <span class="text-danger">{{ $errors->first('home_contact') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.home_contact_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.client.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" required>
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fax">{{ trans('cruds.client.fields.fax') }}</label>
                <input class="form-control {{ $errors->has('fax') ? 'is-invalid' : '' }}" type="text" name="fax" id="fax" value="{{ old('fax', '') }}">
                @if($errors->has('fax'))
                    <span class="text-danger">{{ $errors->first('fax') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.fax_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.client.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="permanent_address">{{ trans('cruds.client.fields.permanent_address') }}</label>
                <input class="form-control {{ $errors->has('permanent_address') ? 'is-invalid' : '' }}" type="text" name="permanent_address" id="permanent_address" value="{{ old('permanent_address', '') }}" required>
                @if($errors->has('permanent_address'))
                    <span class="text-danger">{{ $errors->first('permanent_address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.permanent_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="domicile">{{ trans('cruds.client.fields.domicile') }}</label>
                <input class="form-control {{ $errors->has('domicile') ? 'is-invalid' : '' }}" type="text" name="domicile" id="domicile" value="{{ old('domicile', '') }}">
                @if($errors->has('domicile'))
                    <span class="text-danger">{{ $errors->first('domicile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.domicile_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="next_of_kin">{{ trans('cruds.client.fields.next_of_kin') }}</label>
                <input class="form-control {{ $errors->has('next_of_kin') ? 'is-invalid' : '' }}" type="text" name="next_of_kin" id="next_of_kin" value="{{ old('next_of_kin', '') }}" required>
                @if($errors->has('next_of_kin'))
                    <span class="text-danger">{{ $errors->first('next_of_kin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.next_of_kin_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="relation_kin">{{ trans('cruds.client.fields.relation_kin') }}</label>
                <input class="form-control {{ $errors->has('relation_kin') ? 'is-invalid' : '' }}" type="text" name="relation_kin" id="relation_kin" value="{{ old('relation_kin', '') }}" required>
                @if($errors->has('relation_kin'))
                    <span class="text-danger">{{ $errors->first('relation_kin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.relation_kin_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cnic_ni_cop_kin_no">{{ trans('cruds.client.fields.cnic_ni_cop_kin_no') }}</label>
                <input class="form-control {{ $errors->has('cnic_ni_cop_kin_no') ? 'is-invalid' : '' }}" type="text" name="cnic_ni_cop_kin_no" id="cnic_ni_cop_kin_no" value="{{ old('cnic_ni_cop_kin_no', '') }}" required>
                @if($errors->has('cnic_ni_cop_kin_no'))
                    <span class="text-danger">{{ $errors->first('cnic_ni_cop_kin_no') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.cnic_ni_cop_kin_no_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="passport_no_kin">{{ trans('cruds.client.fields.passport_no_kin') }}</label>
                <input class="form-control {{ $errors->has('passport_no_kin') ? 'is-invalid' : '' }}" type="text" name="passport_no_kin" id="passport_no_kin" value="{{ old('passport_no_kin', '') }}">
                @if($errors->has('passport_no_kin'))
                    <span class="text-danger">{{ $errors->first('passport_no_kin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.passport_no_kin_helper') }}</span>
            </div>
            {{-- <div class="form-group">
                <label for="picture">{{ trans('cruds.client.fields.picture') }}</label>
                <div class="needsclick dropzone {{ $errors->has('picture') ? 'is-invalid' : '' }}" id="picture-dropzone">
                </div>
                @if($errors->has('picture'))
                    <span class="text-danger">{{ $errors->first('picture') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.picture_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cnic_pic">{{ trans('cruds.client.fields.cnic_pic') }}</label>
                <div class="needsclick dropzone {{ $errors->has('cnic_pic') ? 'is-invalid' : '' }}" id="cnic_pic-dropzone">
                </div>
                @if($errors->has('cnic_pic'))
                    <span class="text-danger">{{ $errors->first('cnic_pic') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.cnic_pic_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="signature">{{ trans('cruds.client.fields.signature') }}</label>
                <div class="needsclick dropzone {{ $errors->has('signature') ? 'is-invalid' : '' }}" id="signature-dropzone">
                </div>
                @if($errors->has('signature'))
                    <span class="text-danger">{{ $errors->first('signature') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.signature_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="thumb">{{ trans('cruds.client.fields.thumb') }}</label>
                <div class="needsclick dropzone {{ $errors->has('thumb') ? 'is-invalid' : '' }}" id="thumb-dropzone">
                </div>
                @if($errors->has('thumb'))
                    <span class="text-danger">{{ $errors->first('thumb') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.thumb_helper') }}</span>
            </div> --}}
            <div class="form-group">
                <label for="referred_by">{{ trans('cruds.client.fields.referred_by') }}</label>
                <input class="form-control {{ $errors->has('referred_by') ? 'is-invalid' : '' }}" type="text" name="referred_by" id="referred_by" value="{{ old('referred_by', '') }}">
                @if($errors->has('referred_by'))
                    <span class="text-danger">{{ $errors->first('referred_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.referred_by_helper') }}</span>
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
    Dropzone.options.pictureDropzone = {
    url: '{{ route('admin.clients.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="picture"]').remove()
      $('form').append('<input type="hidden" name="picture" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="picture"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($client) && $client->picture)
      var file = {!! json_encode($client->picture) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="picture" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    Dropzone.options.cnicPicDropzone = {
    url: '{{ route('admin.clients.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="cnic_pic"]').remove()
      $('form').append('<input type="hidden" name="cnic_pic" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="cnic_pic"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($client) && $client->cnic_pic)
      var file = {!! json_encode($client->cnic_pic) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="cnic_pic" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    Dropzone.options.signatureDropzone = {
    url: '{{ route('admin.clients.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="signature"]').remove()
      $('form').append('<input type="hidden" name="signature" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="signature"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($client) && $client->signature)
      var file = {!! json_encode($client->signature) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="signature" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    Dropzone.options.thumbDropzone = {
    url: '{{ route('admin.clients.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="thumb"]').remove()
      $('form').append('<input type="hidden" name="thumb" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="thumb"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($client) && $client->thumb)
      var file = {!! json_encode($client->thumb) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="thumb" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection