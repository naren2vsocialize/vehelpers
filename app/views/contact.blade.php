@extends('layouts.main')

@section('content')
	<!-- header !-->
	<div class="contact-con">
	  @include('layouts.header')
	  @include('layouts.authenticated')
	  @include('layouts.login')
  <section class="container">
    <div class="white-text">
      <h1 class="margin-top-none alt-font">We are ready to support you @<br>
        <b>24</b>/<b>7</b> </h1>
    </div>
  </section>
  <div class="clearfix"></div>
</div>
<!-- header !--> 
<!-- contact !-->
<div>
  <section class="container alt-font">
    <div class="col-lg-12 margin-top"> 
      <!--contact !-->
      
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> <img src="images/contact-con.jpg" /> </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <p class="contact-detail"> FOI 1st Block, 4th Floor,<br>
          Jains Apartments, Avinashi Road,<br>
          Peelamedu, <br>
          Coimbatore - 641 004.<br>
          South INDIA<br>
          +91 95977 99432<br>
          support@support.com<br>
        </p>
      </div>
      
      <!-- contact !-->
      <div class="clearfix"></div>
    </div>
  </section>
</div>
<!-- contact !--> 
<!-- fotter !-->
@include('layouts.footer')
<!-- fotter !-->
@stop