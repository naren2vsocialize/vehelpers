  @if(!Session::has('user'))
	  <section class="container padding-none">
		  		<div class="signup-login">
			  		<a href="" class="pop-login alt-font-b" data-toggle="modal" data-target="#login">Login</a>
			  		<a href="" class="signup alt-font-b" data-toggle="modal" data-target="#signup">Signup</a> 
		  		</div>
	  </section>
  @endif