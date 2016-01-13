<div id="login" class="modal fade" role="dialog">
	<div class="modal-dialog">
			<form method="POST" action="login" class="alt-font">
			<div class="login">
				<a href="#" class="close" data-dismiss="modal" aria-label="close">&times;</a>
				<div class="clearfix"></div>
			    <div>
			        <div>Email</div>
			        <div>
			        <input type="email" name="email" value="" class="textbox">
			        @if ($errors->has('email'))
			    		<span class="error">{{ $errors->first('email') }}</span>
					@endif
					</div>
			    </div>
			
			    <div>
			        <div>Password</div>
			       <div> <input type="password" name="password" id="password" class="textbox">
			        @if ($errors->has('password'))
			    		<span class="error">{{ $errors->first('password') }}</span>
					@endif
					</div>
			    </div>
			
			    <!-- <div>
			        <input type="checkbox" name="remember"> Remember Me
			    </div>-->
				<div class="button-action">
				    <div class="text-center">
				        <button type="submit" class="login-button alt-font">Login</button>
				    </div>
			    	<div class="clear"></div>
				</div>
			</div>
		</form>
	</div>
</div>
