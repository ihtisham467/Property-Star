@extends('layouts.admin')
@section('content')
@can('payment_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.payments.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.payment.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.payment.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Payment">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.application') }}
                        </th>
                        <th>
                            {{ trans('cruds.application.fields.form_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.challan_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.payment_mode') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.payment_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.payment_medium') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.depositor_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.payment.fields.created_by') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($applications as $key => $item)
                                    <option value="{{ $item->form_no }}">{{ $item->form_no }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Payment::PAYMENT_MODE_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Payment::PAYMENT_TYPE_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Payment::PAYMENT_MEDIUM_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($users as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $key => $payment)
                        <tr data-entry-id="{{ $payment->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $payment->id ?? '' }}
                            </td>
                            <td>
                                {{ $payment->application->form_no ?? '' }}
                            </td>
                            <td>
                                {{ $payment->application->form_no ?? '' }}
                            </td>
                            <td>
                                {{ $payment->challan_no ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Payment::PAYMENT_MODE_SELECT[$payment->payment_mode] ?? '' }}
                            </td>
                            <td>
                                {{ $payment->date ?? '' }}
                            </td>
                            <td>
                                {{ $payment->amount ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Payment::PAYMENT_TYPE_SELECT[$payment->payment_type] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Payment::PAYMENT_MEDIUM_SELECT[$payment->payment_medium] ?? '' }}
                            </td>
                            <td>
                                {{ $payment->depositor_name ?? '' }}
                            </td>
                            <td>
                                {{ $payment->created_by->name ?? '' }}
                            </td>
                            <td>
                                @can('payment_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.payments.show', $payment->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('payment_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.payments.edit', $payment->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('payment_delete')
                                    <form action="{{ route('admin.payments.destroy', $payment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('payment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.payments.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Payment:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection