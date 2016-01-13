@if(Session::has('user'))
	  <section class="container padding-none">
	    <div class="user-dash-pannel alt-font">
	      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
	        <h5 class="text-uppercase">
	        	{{ Session::get('user')->name }}
	        </h5>
	        <h6>Download Remaining : {{ Auth::user()->download_count }}</h6>
	      </div>
	      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-left"> <a href="logout" class="logout alt-font">Logout</a></div>
	    </div>
	  </section>
@endif
