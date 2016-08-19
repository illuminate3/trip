@extends('layouts.dash')

@section('page-title')
    Hotels
@stop

@section('page-description')
    All Hotels
@stop

@section('content')
    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                 All registered hotels are listed below. You can click on approve to show on your app and suspend to hide from other users.
            </h3>

            <div class="example-box-wrapper">
                <table id="datatable-tabletools" class="table table-striped table-bordered" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr>
                        <th>Name</th>

                        <th>Status</th>
                        <th>Image</th>
                        <th>Updated At</th>
                        <th>Options</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Name</th>

                        <th>status</th>
                        <th>Image</th>
                        <th>Updated At</th>
                        <th> Options</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($hotels as $hotel)
                        <tr>
                            <td>
                            <a href="#modal-hotel-{{ $hotel->id }}" class="modal-open" data-toggle="modal" data-target="#modal-hotel-{{ $hotel->id }}">
                                {{ $hotel->name }}
                            </a>
                            </td>

                            <td>{{ ($hotel->status == '1') ? 'Approved' : 'Suspended' }}</td>
                            <td><img src="{{ asset('uploads/images/hotel/'.$hotel->logo) }}" alt="" class="img-thumbnail img-responsive"/></td>

                            <td>{{ $hotel->updated_at }}</td>
                            <td>
                                <a href="{{ url('approve/hotel/'.$hotel->id )}}" class="btn btn-primary">Approve</a>
                                <a href="{{ url('suspend/hotel/'.$hotel->id )}}" class="btn btn-primary">Suspend</a>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @foreach($hotels as $hotel)
      <div class="modal fade" id="modal-hotel-{{$hotel->id}}" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">{{ $hotel->name }}</h4>
              </div>
              <div class="modal-body">
                {{ $hotel->description }}
              </div>
              <div class="modal-footer">
                @if($hotel->contact)
                    {{ $hotel->contact->district }}
                @endif
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    @endforeach
    
@stop

@section('script')
    <script type="text/javascript" src="{{ asset("assets/widgets/datatable/datatable-tabletools.js") }}"></script>
    <script type="text/javascript">

        /* Datatables export */

        $(document).ready(function () {


            var table = $('#datatable-tabletools').DataTable();
            var tt = new $.fn.dataTable.TableTools(table);

            $(tt.fnContainer()).insertBefore('#datatable-tabletools_wrapper div.dataTables_filter');

            $('.DTTT_container').addClass('btn-group');
            $('.DTTT_container a').addClass('btn btn-default btn-md');

            $('.dataTables_filter input').attr("placeholder", "Search...");

        });

        /* Datatables reorder */

        $(document).ready(function () {
            $('#datatable-reorder').DataTable({
                dom: 'Rlfrtip'
            });

            $('#datatable-reorder_length').hide();
            $('#datatable-reorder_filter').hide();

        });

        $(document).ready(function () {
            $('.dataTables_filter input').attr("placeholder", "Search...");
        });

    </script>
@stop
