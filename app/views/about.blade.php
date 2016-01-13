@extends('layouts.main')

@section('content')
	<!-- header !-->
	<div class="about-con">
	  @include('layouts.header')
	  @include('layouts.authenticated')
	  @include('layouts.login')
	  <section class="container">
	    <div class="white-text">
	      <p style="height:5em;">&nbsp;</p>
	      <h1>Lorem ipsum dolor sit amet,<br>
	        consectetur adipiscing elit. </h1>
	      <h3> Curabitur tincidunt porta purus id iaculis. Nulla id ipsum eget quam blandit convallis in id ex. Ut et orci vitae tellus feugiat dictum in et tellus. Lorem ipsum dolor sit amet,</h3>
	    </div>
	  </section>
	  <div class="clearfix"></div>
	</div>
	<!-- header !--> 
	<!-- about !-->
	<div>
	  <section class="container alt-font">
	    <div class="col-lg-12 margin-top"> 
	      <!-- about content !-->
	      <div>
	      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
	      <div>
	      <img src="images/about-concept.jpg"/>	
	      </div>
	      </div>
	      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
	      <h3 class="alt-font-b text-uppercase margin-top-none">Lorem ipsum</h3>
	<p>
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt porta purus id iaculis. Nulla id ipsum eget quam blandit convallis in id ex. Ut et orci vitae tellus feugiat dictum in et tellus. Morbi eu lorem neque. Fusce neque nibh, porta at sapien nec, sodales semper nisi. Ut mattis semper fermentum. Vestibulum scelerisque elit at metus aliquet, non interdum lorem suscipit. Proin sapien metus, elementum eget porttitor at, auctor vitae sapien. Pellentesque lacinia turpis sit amet maximus varius. Curabitur ut ex velit. 
	</p>
	<h3 class="alt-font-b text-uppercase">
	Lorem ipsum dolor sit amet, consectetur</h3>
	<p>
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt porta purus id iaculis. Nulla id ipsum eget quam blandit convallis in id ex. Ut et orci vitae tellus feugiat dictum in et tellus. Morbi eu lorem neque. Fusce neque nibh, porta at sapien nec, sodales semper nisi. Ut mattis semper fermentum. Vestibulum scelerisque elit at metus aliquet, non interdum lorem suscipit. Proin sapien metus, elementum eget porttitor at, auctor vitae sapien. Pellentesque lacinia turpis sit amet maximus varius. Curabitur ut ex velit. </p>
	      </div>
	      <div class="clearfix"></div>
	      </div>
	      <!-- about content !-->
	      <!-- advantage !-->
	      <div class="margin-top">
	      <!-- advantage !-->
	      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 margin-bottom-15">
	      <div class="about-adva advantage-con">
	      <div class="">
	      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><img src="images/advantage.png"/></div>
	      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 text-right"><h4 class="text-uppercase">Advantage</h4></div>
	      <div class="clearfix"></div>
	      </div>
	      <div class="about-adva-text">
	     Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt porta purus id iaculis. Nulla id ipsum eget quam blandit convallis in id ex.
	      </div>
	      <div class=""clearfix></div>
	</div>
	</div>
	<!-- advantage !-->
	      <!-- disadvantage !-->
	      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 margin-bottom-15">
	      <div class="about-adva disadvantage-con">
	      <div class="">
	      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><img src="images/dis-advantage.png"/></div>
	      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 text-right"><h4 class="text-uppercase">Disadvantage</h4></div>
	      <div class="clearfix"></div>
	      </div>
	      <div class="about-adva-text">
	     Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt porta purus id iaculis.
	      </div>
	      <div class=""clearfix></div>
	</div>
	</div>
	<!-- disadvantage !-->
	      <!-- who we are !-->
	      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 margin-bottom-15">
	      <div class="about-adva whoweare-con">
	      <div class="">
	      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><img src="images/who-we-are.png"/></div>
	      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 text-right"><h4 class="text-uppercase">Who We are</h4></div>
	      <div class="clearfix"></div>
	      </div>
	      <div class="about-adva-text">
	     Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt porta purus id iaculis. Nulla id ipsum eget quam blandit convallis in id ex.
	      </div>
	      <div class=""clearfix></div>
	</div>
	</div>
	<!-- who we are !-->
	      <div class="clearfix"></div>
	      </div>
	      <!-- advantage !-->
	      <div class="clearfix"></div>
	    </div>
	  </section>
	</div>
	<!-- about !--> 
	<!-- fotter !-->
	@include('layouts.footer')
	<!-- fotter !-->
@stop
