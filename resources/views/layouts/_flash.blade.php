@if (Session::has('errMsg'))
       <div class="callout alert " data-closeable>
            <button type="button" class="close-button" data-close>&times;</button>

            {!! Session::get('errMsg') !!}
        </div>
    
@endif
@if (Session::has('sucMsg'))
       <div class="callout success" data-closeable>
            <button type="button" class="close-button" data-close">&times;</button>

            {!! Session::get('sucMsg') !!}
        </div>
    
@endif
@if (Session::has('gallery.update'))
       <div class="callout alert " data-closeable>
            <button type="button" close-button" data-close>&times;</button>

            {!! Session::get('gallery.update') !!}
        </div>
    
@endif