@if (Session::has('errMsg'))
       <div class="callout alert ">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            {!! Session::get('errMsg') !!}
        </div>
    
@endif
@if (Session::has('sucMsg'))
       <div class="callout alert ">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            {!! Session::get('sucMsg') !!}
        </div>
    
@endif
@if (Session::has('gallery.update'))
       <div class="callout alert ">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            {!! Session::get('gallery.update') !!}
        </div>
    
@endif