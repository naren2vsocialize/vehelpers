@extends('layouts.main')

@section('content')
<!-- header !-->
<div class="package-con">
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
<!-- packaged !-->
<div>
  <section class="container">
    <div class="col-lg-12 margin-top"> 
      <!-- single package !-->
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="package-detail-con alt-font">
          <h2 class="grey-text alt-font-b text-uppercase">ONE MONTH SUBSCRIBE</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt porta purus id iaculis. Nulla id ipsum eget quam blandit convallis in id ex. Ut et orci vitae tellus feugiat dictum in et tellus. Morbi eu lorem neque. Fusce neque nibh, porta at sapien nec, sodales semper nisi. Ut mattis semper fermentum. Vestibulum scelerisque elit at metus aliquet, non interdum lorem suscipit.</p>
          <p class="grey-text text-center"><font class="font-80">30</font>days <font class="font-50">10</font> <font class="font-30">UPLOADS</font></p>
          <div class="text-center"><a href="subscribe" class="sub-link white-text text-uppercase">Subscribe</a></div>
        </div>
      </div>
      <!-- single package !--> 
      <!-- single package !-->
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="package-detail-con alt-font bg-blue">
          <h2 class="white-text alt-font-b text-uppercase">ONE MONTH SUBSCRIBE</h2>
          <p class="white-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt porta purus id iaculis. Nulla id ipsum eget quam blandit convallis in id ex. Ut et orci vitae tellus feugiat dictum in et tellus. Morbi eu lorem neque. Fusce neque nibh, porta at sapien nec, sodales semper nisi. Ut mattis semper fermentum. Vestibulum scelerisque elit at metus aliquet, non interdum lorem suscipit.</p>
          <p class="white-text text-center"><font class="font-80">30</font>days <font class="font-50">10</font> <font class="font-30">UPLOADS</font></p>
          <div class="text-center"><a href="subscribe" class="sub-link white-text text-uppercase">Subscribe</a></div>
        </div>
      </div>
      <!-- single package !--> 
      <!-- single package !-->
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="package-detail-con alt-font bg-blue">
          <h2 class="white-text alt-font-b text-uppercase">ONE MONTH SUBSCRIBE</h2>
          <p class="white-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt porta purus id iaculis. Nulla id ipsum eget quam blandit convallis in id ex. Ut et orci vitae tellus feugiat dictum in et tellus. Morbi eu lorem neque. Fusce neque nibh, porta at sapien nec, sodales semper nisi. Ut mattis semper fermentum. Vestibulum scelerisque elit at metus aliquet, non interdum lorem suscipit.</p>
          <p class="white-text text-center"><font class="font-80">30</font>days <font class="font-50">10</font> <font class="font-30">UPLOADS</font></p>
          <div class="text-center"><a href="subscribe" class="sub-link white-text text-uppercase">Subscribe</a></div>
        </div>
      </div>
      <!-- single package !--> 
      <!-- single package !-->
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="package-detail-con alt-font">
          <h2 class="grey-text alt-font-b text-uppercase">ONE MONTH SUBSCRIBE</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt porta purus id iaculis. Nulla id ipsum eget quam blandit convallis in id ex. Ut et orci vitae tellus feugiat dictum in et tellus. Morbi eu lorem neque. Fusce neque nibh, porta at sapien nec, sodales semper nisi. Ut mattis semper fermentum. Vestibulum scelerisque elit at metus aliquet, non interdum lorem suscipit.</p>
          <p class="grey-text text-center"><font class="font-80">30</font>days <font class="font-50">10</font> <font class="font-30">UPLOADS</font></p>
          <div class="text-center"><a href="subscribe" class="sub-link white-text text-uppercase">Subscribe</a></div>
        </div>
      </div>
      <!-- single package !-->
      <div class="clearfix"></div>
    </div>
  </section>
</div>
<!-- packaged !--> 
<!-- fotter !-->
@include('layouts.footer')
<!-- fotter !-->
@stop
