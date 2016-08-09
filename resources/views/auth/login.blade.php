@extends('layouts.homepage')

@section('title')
    Log In
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="columns medium-8 medium-offset-2 ">
            <div class="regester-form">
                <div class="small-12 large-4 columns float-right">
                    <h4>Log In With</h4>
                    <ul>
                        <li><a href="{{ route('social.login', ['facebook']) }}"><img src="{{ asset('neptrip/images/fb-login.jpg') }}" alt=""></a></li>
                        <li><a href="{{ route('social.login', ['twitter']) }}"><img src="{{ asset('neptrip/images/tw-login.jpg') }}" alt=""></a></li>
                        <li><a href="{{ route('social.login', ['google']) }}"><img src="{{ asset('neptrip/images/gp-login.jpg') }}" alt=""></a></li>
                    </ul>
                </div>
                <div class="small-12 large-8 columns login-form">
                    <h4>Log in</h4>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">E-Mail</label>
                                <div class="col-md-6">
                                    <input id="email" type="email"  name="email" value="{{ old('email') }}" placeholder="yourname@gmail.com">

                                    @if ($errors->has('email'))
                                        <span class="caption alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Enter your password">

                                    @if ($errors->has('password'))
                                        <span class="caption alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="columns medium-6 medium-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <button type="submit" class="button">
                                        <i class="button"></i> Login
                                    </button>

                                    <a href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


