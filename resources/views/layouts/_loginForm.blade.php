 {{ csrf_field() }}

<input id="email" type="email"  name="email" value="{{ old('email') }}" placeholder="yourname@gmail.com">

    @if ($errors->has('email'))
        <span class="caption alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif

    <input id="password" type="password" class="form-control" name="password" placeholder="Enter your password">

    @if ($errors->has('password'))
        <span class="caption alert">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
    <div class="small-6 columns remember">
        <input id="remember" type="checkbox"><label for="remember">Remember me</label>
    </div>

    <button type="submit" class="button expanded">
        Login
    </button>
    <div class="small-6 columns forgot">
        <a href="{{ url('/password/reset') }}">Forgot Your Password?</a>
    </div>