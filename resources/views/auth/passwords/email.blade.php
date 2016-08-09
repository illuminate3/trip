@extends('layouts.homepage')

@section('title')
    Reset Password
@stop
<!-- Main Content -->

@section('content')
    <section class="container">
        <div class="section-wrap row">
            <div class="section-head">
                <h3>Forgot your password</h3>
            </div>
            <div class="section-content">
                @if (session('status'))
                    <div class="success callout">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="row">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-Mail Address</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn button btn-primary">
                                <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
