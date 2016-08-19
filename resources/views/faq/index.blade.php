@extends('layouts.dash')

@section('page-title')
    Faq
@stop

@section('page-description')
    All Faq
@stop

@section('content')
    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                Choose a faq to edit
            </h3>

            <div class="example-box-wrapper">
                <table id="datatable-tabletools" class="table table-striped table-bordered" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Order</th>
                        <th>Updated At</th>
                        <th>Options</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Order</th>
                        <th>Updated At</th>
                        <th>Options</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($faq as $vehicle)
                        <tr>
                            <td>{{ $vehicle->question }}</td>

                            <td>{{ $vehicle->answer }}</td>
                            <td>{{ $vehicle->order }}/></td>

                            <td>{{ $vehicle->updated_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('dash.faq.edit',[$vehicle->id])  }}" class="btn btn-primary">Edit</a>
                                {!! Form::open(['route' => ['dash.faq.destroy',$vehicle->id],'method'=>'DELETE']) !!}
                                    {!! Form::submit('Delete',['class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
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
