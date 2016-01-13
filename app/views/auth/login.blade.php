@extends('layouts.main')

@section('content')
	<div class="landing">
		@include('layouts.header')
		@include('layouts.login')
		<section class="bottom-ser">
		  <div class="container">
		    <div> 
		      <!-- upload !-->
		      <div class="col-lg-4 col-md-4 col-sm-4">
		        <div class="services">
		          <p><img src="images/services-upload.png"/></p>
		          <p>
		          <h4 class="alt-font-b text-uppercase">UPLOAD YOUR FILE</h4>
		          </p>
		          <p class="alt-font">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec orci enim.</p>
		        </div>
		      </div>
		      <!-- upload !--> 
		      <!-- process !-->
		      <div class="col-lg-4 col-md-4 col-sm-4">
		        <div class="services">
		          <p><img src="images/service-process.png"/></p>
		          <p>
		          <h4 class="alt-font-b text-uppercase">convert your pdf</h4>
		          </p>
		          <p class="alt-font">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec orci enim.</p>
		        </div>
		      </div>
		      <!-- process !--> 
		      <!-- download !-->
		      <div class="col-lg-4 col-md-4 col-sm-4">
		        <div class="services">
		          <p><img src="images/services-pdf-down.png"/></p>
		          <p>
		          <h4 class="alt-font-b text-uppercase">DOWNLOAD YOUR PDF</h4>
		          </p>
		          <p class="alt-font">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec orci enim.</p>
		        </div>
		      </div>
		      <!-- download !-->
		      <div class="clearfix"></div>
		    </div>
		    <div class="col-lg-12 sub-con"> <a href="package" class="subscription alt-font-b text-uppercase">Subscription</a>
		      <div class="clearfix"></div>
		    </div>
		  </div>
		</section>
	</div>
		
@stop