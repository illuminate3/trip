@extends('layouts.dash')

@section('page-title')
    Carousel
@stop

@section('page-description')
    All Carousels
@stop

@section('content')

    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                Choose a carousel to edit
            </h3>

            <div class="example-box-wrapper">
                <table id="datatable-tabletools" class="table table-striped table-bordered" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr>
                        <th>Name</th>

                        <th>Status</th>
                        <th>Position</th>
                        <th>Image</th>
                        <th>Last Changed</th>
                        <th>Options</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Position</th>
                        <th>Image</th>
                        <th>Last Changed</th>
                        <th> Options</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    @foreach($carousels as $vehicle)
                        <tr>
                            <td>{{ $vehicle->title }}</td>

                            <td>{{ $vehicle->status }}</td>
                            <td>{{ $vehicle->position }}</td>

                            <td>
                                @if(strlen($vehicle->image) > 0)
                                    <img src="{{ asset('uploads/carousel/'.$vehicle->image) }}" alt="" class="img-thumbnail img-responsive"/>
                                @else
                                    <p>No Image Available</p>
                                @endif
                            </td>

                            <td>{{ $vehicle->updated_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('dash.carousel.edit',[$vehicle->id])}}" class="btn btn-primary">Edit</a>
                                {{ Form::open(['route'=>['dash.carousel.destroy',$vehicle->id],"method"=>'DELETE']) }}
                                
                                    {!! Form::submit('Delete',['class'=>'btn btn-primary']) !!}
                                {{ Form::close() }}
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
