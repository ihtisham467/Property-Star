<div class="m-3">
    @can('installment_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.installments.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.installment.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.installment.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-applicationInstallments">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.installment.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.installment.fields.application') }}
                            </th>
                            <th>
                                {{ trans('cruds.application.fields.form_no') }}
                            </th>
                            <th>
                                {{ trans('cruds.installment.fields.due_date') }}
                            </th>
                            <th>
                                {{ trans('cruds.installment.fields.amount') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($installments as $key => $installment)
                            <tr data-entry-id="{{ $installment->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $installment->id ?? '' }}
                                </td>
                                <td>
                                    {{ $installment->application->form_no ?? '' }}
                                </td>
                                <td>
                                    {{ $installment->application->form_no ?? '' }}
                                </td>
                                <td>
                                    {{ $installment->due_date ?? '' }}
                                </td>
                                <td>
                                    {{ $installment->amount ?? '' }}
                                </td>
                                <td>
                                    @can('installment_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.installments.show', $installment->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('installment_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.installments.edit', $installment->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('installment_delete')
                                        <form action="{{ route('admin.installments.destroy', $installment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('installment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.installments.massDestroy') }}",
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
  let table = $('.datatable-applicationInstallments:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection