@extends('layouts.admin')
@section('content')
@can('application_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.applications.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.application.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.application.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Application">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.application.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.application.fields.form_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.application.fields.client') }}
                        </th>
                        <th>
                            {{ trans('cruds.client.fields.cnic_nicop_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.application.fields.plot') }}
                        </th>
                        <th>
                            {{ trans('cruds.application.fields.dealer') }}
                        </th>
                        <th>
                            {{ trans('cruds.dealer.fields.cnic') }}
                        </th>
                        <th>
                            {{ trans('cruds.application.fields.agent') }}
                        </th>
                        <th>
                            {{ trans('cruds.application.fields.manager') }}
                        </th>
                        <th>
                            {{ trans('cruds.application.fields.discount') }}
                        </th>
                        <th>
                            {{ trans('cruds.application.fields.total_after_discount') }}
                        </th>
                        <th>
                            {{ trans('cruds.application.fields.payment_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.application.fields.no_of_installments') }}
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
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($clients as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($plots as $key => $item)
                                    <option value="{{ $item->plotid }}">{{ $item->plotid }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($dealers as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
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
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($users as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Application::PAYMENT_TYPE_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $key => $application)
                        <tr data-entry-id="{{ $application->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $application->id ?? '' }}
                            </td>
                            <td>
                                {{ $application->form_no ?? '' }}
                            </td>
                            <td>
                                {{ $application->client->name ?? '' }}
                            </td>
                            <td>
                                {{ $application->client->cnic_nicop_no ?? '' }}
                            </td>
                            <td>
                                {{ $application->plot->plotid ?? '' }}
                            </td>
                            <td>
                                {{ $application->dealer->name ?? '' }}
                            </td>
                            <td>
                                {{ $application->dealer->cnic ?? '' }}
                            </td>
                            <td>
                                {{ $application->agent->name ?? '' }}
                            </td>
                            <td>
                                {{ $application->manager->name ?? '' }}
                            </td>
                            <td>
                                {{ $application->discount ?? '' }}
                            </td>
                            <td>
                                {{ $application->total_after_discount ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Application::PAYMENT_TYPE_SELECT[$application->payment_type] ?? '' }}
                            </td>
                            <td>
                                {{ $application->no_of_installments ?? '' }}
                            </td>
                            <td>
                                @can('application_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.applications.show', $application->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('application_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.applications.edit', $application->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('application_delete')
                                    <form action="{{ route('admin.applications.destroy', $application->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('application_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.applications.massDestroy') }}",
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
  let table = $('.datatable-Application:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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