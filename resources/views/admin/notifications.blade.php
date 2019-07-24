@extends('layouts.default2')
@section('titlepage')
<br>
Notification
@endsection

@section('style')
<style>
    .text_bold {

        font-weight: bold;
    }
</style>

@endsection
@section('content')

<ul id="notifications">
    @foreach($notifications as $notification)
    <li {{ $notification->read_at? '':'class=text_bold' }}>
        <a href="{{ $notification->data['url'] }}">

            {{$notification->data['message']}}
        </a>
        <time> {{$notification->created_at->diffForHumans()}}</time>

        {{$notification->markAsRead()}}
    </li>
    @endforeach
</ul>


{{--<script src="https://js.pusher.com/4.4/pusher.min.js"></script>--}}
<script src="{{asset('js/app.js')}}"></script>
<script >


Echo.private('App.User.{{Auth::id()}}')
    .notification((notification) => {
    //   alert(notification.message);
    $('#notifications').prepend('<li class="text_bold"><a href="'+  notification.url   +  '"> '+ notification.message +' </a>  </li>');
    });


    // Enable pusher logging - don't include this in production
 /*   Pusher.logToConsole = true;

    var pusher = new Pusher('8af958717591bd0b1bf3', {
      cluster: 'ap2',
      forceTLS: true,
      authEndpoint:'/broadcasting/auth'
    });

    var channel = pusher.subscribe('private_App.User.{{Auth::user()->id}}');
    channel.bind('my-event', function(data) {
      alert(data.message);
    });*/
  </script>





@endsection
