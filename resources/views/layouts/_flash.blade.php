@if (Session::has('errMsg'))
    <script>
      
    toastr.warning('{!! Session::get('errMsg') !!}')
    toastr.options.progressBar = true;
    toastr.options.showEasing = 'swing';
    toastr.options.closeButton = true;
    toastr.options.closeHtml = '<button><i class="ti-close"></i></button>';
  </script>  
@endif
@if (Session::has('sucMsg'))
  <script>
    toastr.success('{!! Session::get('sucMsg') !!}');
    toastr.options.progressBar = true;
    toastr.options.showEasing = 'swing';
    toastr.options.closeButton = true;
    toastr.options.closeHtml = '<button><i class="ti-close"></i></button>';
  </script>
@endif
@if (Session::has('gallery.update'))
       <div class="callout alert " data-closeable>
            <button type="button" close-button" data-close>&times;</button>
            {!! Session::get('gallery.update') !!}
        </div>
    
@endif