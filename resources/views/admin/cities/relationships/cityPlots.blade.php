<div class="m-3">
    @can('plot_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.plots.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.plot.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.plot.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-cityPlots">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.plot.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.plot.fields.plotid') }}
                            </th>
                            <th>
                                {{ trans('cruds.plot.fields.block') }}
                            </th>
                            <th>
                                {{ trans('cruds.plot.fields.city') }}
                            </th>
                            <th>
                                {{ trans('cruds.plot.fields.plot_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.plot.fields.size') }}
                            </th>
                            <th>
                                {{ trans('cruds.plot.fields.total_price') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($plots as $key => $plot)
                            <tr data-entry-id="{{ $plot->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $plot->id ?? '' }}
                                </td>
                                <td>
                                    {{ $plot->plotid ?? '' }}
                                </td>
                                <td>
                                    {{ $plot->block ?? '' }}
                                </td>
                                <td>
                                    {{ $plot->city->name ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Plot::PLOT_TYPE_SELECT[$plot->plot_type] ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Plot::SIZE_SELECT[$plot->size] ?? '' }}
                                </td>
                                <td>
                                    {{ $plot->total_price ?? '' }}
                                </td>
                                <td>
                                    @can('plot_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.plots.show', $plot->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('plot_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.plots.edit', $plot->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('plot_delete')
                                        <form action="{{ route('admin.plots.destroy', $plot->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('plot_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.plots.massDestroy') }}",
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
  let table = $('.datatable-cityPlots:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection