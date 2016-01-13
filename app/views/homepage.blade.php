@extends('layouts.main')

@section('content')
	<!-- header !-->
	<div class="dashboard-con">
	  @include('layouts.header')
	  @include('layouts.authenticated')
	  <section class="container">
	    <div class="white-text">
	      <h1 class="margin-top-none alt-font">Quick & Easy  Convert Your <br>
	        <b>XLS</b> file to <b>PDF</b> </h1>
	    </div>
	  </section>
	  <div class="clearfix"></div>
	</div>
	<!-- header !--> 
	<!-- dashboard !-->
	<form id="upload_download" method="POST" action="home/upload">
		<div>
		  <section class="container alt-font">
		    <div class="col-lg-12 margin-top">
		    	@if(Session::has('message'))
					<div class="alert alert-info">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Info!</strong>&nbsp;{{ Session::get('message') }}
					</div>
				@endif
				@if ($errors->has('file'))
					<div class="alert alert-danger">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						{{'Please upload your file'}}
					</div>
				@endif 
		      <!-- upload file !-->
		      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		        <div class="dashboard-uploadfile">
		          <h2 class="text-uppercase">upload your File</h2>
		          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt porta purus id iaculis. Nulla id ipsum eget quam blandit convallis in id ex.</p>
		          <div class="dash-action-con">
		            <p class="uploadfilename">No files are selected</p>
		            <button class="dashboard-button text-uppercase dash-upload">UPLOAD</button>
		            <input class="upload-file" id="upload-file" type="file" name="file" />
		          </div>
		        </div>
		      </div>
		      <!-- upload file !--> 
		      <!-- download file !-->
		      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 dash-mar-top">
		        <div class="dashboard-downloadfile">
		          <h2 class="text-uppercase">READY TO DOWNLOAD</h2>
		          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt porta purus id iaculis. Nulla id ipsum eget quam blandit convallis in id ex.</p>
		          <div class="dash-action-con">
		            <p class="downloadfilename">&nbsp;</p>
		            	<button class="dashboard-button text-uppercase dash-download" data-toggle="modal" type="button" data-target="#dConfirmation">DOWNLOAD</button>
		          </div>
		        </div>
		      </div>
		      <!-- download file !-->
		      
		      <div class="clearfix"></div>
		    </div>
		  </section>
		</div>
	</form>
	<!-- dashboard !--> 
	<!-- fotter !-->
	@include('layouts.footer')
	<!-- fotter !-->
	<script>
		jQuery(document).ready(function(){
			jQuery("#upload-file").val("");
			jQuery(".dash-upload").click(function(e){
				e.preventDefault();
				jQuery("input[name='file']").click();
			});
			jQuery("#upload-file").change(function () {
				jQuery(".uploadfilename").html(jQuery("input[name='file']").val());
			});
			jQuery(".dconfirm-ok").click(function(){
				jQuery("#upload_download").submit();
			});
			jQuery(".dconfirm-cancel").click(function(){
				jQuery('#dConfirmation').modal('toggle');
			});
		});
	</script>
	<!-- Modal -->
	<div id="dConfirmation" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	
	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Download Confirmation</h4>
	      </div>
	      <div class="modal-body">
	        <p>Converting and download the selected file will make the donwload count minus one.<br/><br/>Do you want to proceed?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default dconfirm-cancel" data-dismiss="modal">Cancel</button>
	        <button type="button" class="btn btn-primary dconfirm-ok" data-dismiss="modal">Ok</button>
	      </div>
	    </div>
	
	  </div>
	</div>
@stop