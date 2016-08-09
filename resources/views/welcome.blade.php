@extends('layouts.profile')
@section('title')
    Notifications
@stop
@section('profile-content')
<div class="container">
    <div class="row">
        <div class="medium-10 medium-offset-1 column">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    <h1>Your Notifications</h1>
                    <div id="notification">
                        
                    </div>
                    <div id="bookings">
                        
                    </div>
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
   var pusher = new Pusher("{{env("PUSHER_KEY")}}");
    var channel = pusher.subscribe('notification');
    channel.bind('get-user-notification', function(data) {
        if(data.userId == {{ Auth::user()->id }}){
            $('#notification').append("<div class='callout row "+data.type +"'><div class='columns medium-8'>"+data.text+"</div><div class='medium-4 columns'>"+data.created_at+"</div></div>");
        }
    });
    channel.bind('get-booking-notification', function(data) {
        if(data.userId == {{ Auth::user()->id }}){
            $('#bookings').append("<div class='callout row "+data.type +"'><div class='columns medium-8'>"+data.text+"</div><div class='medium-4 columns'>"+data.created_at+"</div></div>");
        }
    });
</script>

@endsection
