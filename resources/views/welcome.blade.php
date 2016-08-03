@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="//js.pusher.com/3.0/pusher.min.js"></script>
<script>
    Pusher.log = function(msg) {
      console.log(msg);
    };
   var pusher = new Pusher("{{env("PUSHER_KEY")}}")
    var channel = pusher.subscribe('test-channel');
    channel.bind('test-event', function(data) {
      alert(data.text);
    });

</script>

@endsection
