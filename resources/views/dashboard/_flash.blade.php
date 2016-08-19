@if (Session::has('flash.message'))
    @if (Session::has('flash.overlay'))
        @include(config('watchtower.views.layouts.modal'), ['modalClass' => 'flash-modal', 'title' => Session::get('flash.title'), 'body' => Session::get('flash.message')])
    @else
        <div class="lead alert alert-{{ Session::get('flash.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            {!! Session::get('flash.message') !!}
        </div>
    @endif
@endif

@if (Session::has('sucMsg'))
       <div class="lead alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

			<script>toastr.success('{{ Session::get('sucMsg') }}')</script>
            {!! Session::get('sucMsg') !!}
        </div>
@endif

@if (Session::has('errMsg'))
       <div class="lead alert alert-error">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<script>toastr.warning('{{ Session::get('errMsg') }}')</script>

            {!! Session::get('errMsg') !!}
        </div>
@endif
