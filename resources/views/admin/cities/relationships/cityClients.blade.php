<div class="m-3">
    @can('client_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.clients.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.client.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.client.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-cityClients">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.client.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.client.fields.membership_no') }}
                            </th>
                            <th>
                                {{ trans('cruds.client.fields.date_of_membership') }}
                            </th>
                            <th>
                                {{ trans('cruds.client.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.client.fields.cnic_nicop_no') }}
                            </th>
                            <th>
                                {{ trans('cruds.client.fields.nationality') }}
                            </th>
                            <th>
                                {{ trans('cruds.client.fields.city') }}
                            </th>
                            <th>
                                {{ trans('cruds.client.fields.phone') }}
                            </th>
                            <th>
                                {{ trans('cruds.client.fields.next_of_kin') }}
                            </th>
                            <th>
                                {{ trans('cruds.client.fields.relation_kin') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $key => $client)
                            <tr data-entry-id="{{ $client->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $client->id ?? '' }}
                                </td>
                                <td>
                                    {{ $client->membership_no ?? '' }}
                                </td>
                                <td>
                                    {{ $client->date_of_membership ?? '' }}
                                </td>
                                <td>
                                    {{ $client->name ?? '' }}
                                </td>
                                <td>
                                    {{ $client->cnic_nicop_no ?? '' }}
                                </td>
                                <td>
                                    {{ $client->nationality ?? '' }}
                                </td>
                                <td>
                                    {{ $client->city->name ?? '' }}
                                </td>
                                <td>
                                    {{ $client->phone ?? '' }}
                                </td>
                                <td>
                                    {{ $client->next_of_kin ?? '' }}
                                </td>
                                <td>
                                    {{ $client->relation_kin ?? '' }}
                                </td>
                                <td>
                                    @can('client_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.clients.show', $client->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('client_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.clients.edit', $client->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('client_delete')
                                        <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('client_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.clients.massDestroy') }}",
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
  let table = $('.datatable-cityClients:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection