@extends('layouts.dash')

@section('page-title')
    Tours
@stop

@section('page-description')
    All Tours
@stop

@section('content')
    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                All registered tours are listed below. To approve a tour you can click on approve and suspend
            </h3>

            <div class="example-box-wrapper">
                <table id="datatable-tabletools" class="table table-striped table-bordered" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr>
                        <th>Name</th>

                        <th>status</th>
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
                    @foreach($tours as $tour)
                        <tr>
                            <td>{{ $tour->name }}</td>

                            <td>{{ ($tour->status =='1')? 'Approved' : 'Suspended' }}</td>
                            <td><img src="{{ asset('uploads/images/tour/'.$tour->logo) }}" alt="" class="img-thumbnail img-responsive"/></td>

                            <td>{{ $tour->updated_at->format('d-M-Y') }}</td>
                            <td>
                                <a href="{{ url('dash/approve/tour/'.$tour->id )}}" class="btn btn-primary">Approve</a>
                                <a href="{{url('dash/suspend/tour/'.$tour->id)}}" class="btn btn-primary">Suspend</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
