<form method="POST" action="signup">
    {!! csrf_field() !!}
    <div>
        Name
        <input type="text" name="name" value="">
         @if ($errors->has('name'))
    		<span class="error">{{ $errors->first('name') }}</span>
		@endif
    </div>
    <div>
        Email
        <input type="email" name="email" value="">
         @if ($errors->has('email'))
    		<span class="error">{{ $errors->first('email') }}</span>
		@endif
    </div>
    <div>
        Password
        <input type="password" name="password">
         @if ($errors->has('password'))
    		<span class="error">{{ $errors->first('password') }}</span>
		@endif
    </div>
    <div>
        Confirm Password
        <input type="password" name="password_confirmation">
         @if ($errors->has('password_confirmation'))
    		<span class="error">{{ $errors->first('password_confirmation') }}</span>
		@endif
    </div>
    <div>
        <button type="submit">Register</button>
    </div>
</form>