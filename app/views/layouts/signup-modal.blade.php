<div id="signup" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<form class="alt-font" method="POST" action="signup">
			<div class="pop-signup">
					<a href="#" class="close" data-dismiss="modal" aria-label="close">&times;</a>
					<div class="clearfix"></div>
				    <div>
				        <div>Name</div>
				        <div><input type="text" name="name" value="" class="textbox"></div>
				         @if ($errors->has('name'))
				    		<span class="error">{{ $errors->first('name') }}</span>
						@endif
				    </div>
				    <div>
				        <div>Email</div>
				        <div><input type="email" name="email" value="" class="textbox"></div>
				         @if ($errors->has('email'))
				    		<span class="error">{{ $errors->first('email') }}</span>
						@endif
				    </div>
				    <div>
				        <div>Password</div>
				        <div><input type="password" id="spassword" name="password" class="textbox"></div>
				         @if ($errors->has('password'))
				    		<span class="error">{{ $errors->first('password') }}</span>
						@endif
				    </div>
				    <div>
				        <div>Confirm Password</div>
				        <div><input type="password" id="password_confirmation" name="password_confirmation" class="textbox"></div>
				         @if ($errors->has('password_confirmation'))
				    		<span class="error">{{ $errors->first('password_confirmation') }}</span>
						@endif
				    </div>
				    <div class="button-action">
				    	<div class="text-center">
							<button type="submit" class="signup-link alt-font">Register</button>
						</div>
						<div class="clear"></div>
					</div>
			</div>
		</form>
	</div>
</div>
