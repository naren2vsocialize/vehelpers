<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=0" />
		<!--font !-->
		<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		{{HTML::style('css/bootstrap.min.css')}}
		{{HTML::script('js/bootstrap.min.js')}}
		{{HTML::script('js/jquery.validate.min.js')}}
		{{HTML::style('css/htom.css')}}
		{{HTML::style('css/login.css')}}
	</head>
	<body>
		@yield('content')
		@include('layouts.login-modal')
		@include('layouts.signup-modal')
	<script>
		jQuery(document).ready(function(){
			jQuery("#login form").validate({
				  debug: true,
				  rules: {
				    password: {
					    required: true,
					    min: 6
					},
				    email: {
				      required: true,
				      email: true
				    }
				  },
				  highlight: function (element, errorClass, validClass) {
                  	jQuery(element).addClass(errorClass).removeClass(validClass);
                  }, 
                  unhighlight: function (element, errorClass, validClass) {
                  	jQuery(element).removeClass(errorClass).addClass(validClass); 
                  },
                  errorPlacement: function(error,element) {
                  	return true;
                  },
                  submitHandler: function(form) {
                	  jQuery.ajax({
                          url: form.action,
                          type: form.method,
                          data: jQuery(form).serialize(),
                          success: function(response) {
                              if(response.status) {
                            	  window.location.href = 'home';
                              }
                              else {
                                  form.reset();
                                  jQuery(".login").prepend("<div class='notify text-center'><span class='error-text'>Please try again</span></div>");
                              }
                          }            
                      });
                  }
                	                  
			});

			jQuery("#login input, #signup input").focus(function(){
				jQuery("#login, #signup").find(".notify").remove();
			});

			jQuery("#signup form").validate({
				  debug: true,
				  rules: {
				    password: {
					    required: true,
					    min: 6
					},
					password_confirmation: {
						required: true, 
	                    equalTo: "#spassword",
	                    minlength: 6
	                },
				    name: {
				      	required: true,
				      	maxlength: 255,
				    },
				    email: {
					      required: true,
					      email: true
					}
				  },
				highlight: function (element, errorClass, validClass) {
                	jQuery(element).addClass(errorClass).removeClass(validClass);
                }, 
                unhighlight: function (element, errorClass, validClass) {
                	jQuery(element).removeClass(errorClass).addClass(validClass); 
                },
                errorPlacement: function(error,element) {
                	return true;
                },
                submitHandler: function(form) {
              	  jQuery.ajax({
                        url: form.action,
                        type: form.method,
                        data: jQuery(form).serialize(),
                        success: function(response) {
                            if(response.status) {
                            	form.reset();
                            	jQuery(".pop-signup").prepend("<div class='notify text-center'><span class='success-text'>Thank you for registering</span></div>");
                            }
                            else {
                                if( !jQuery.isEmptyObject(response.errors) ) {
	                                jQuery.each(response.errors, function(key, value) {
	                                	jQuery("input[name='" +  key + "']").addClass("error");
	                                	if(key == "email") {
	                                		jQuery(".pop-signup").prepend("<div class='notify text-center'><span class='error-text'>" + value + "</span></div>");
	                                	}
	                                });
                                }
                                else {
                                	form.reset();
                                	jQuery(".pop-signup").prepend("<div class='notify text-center'><span class='error-text'>Please try again</span></div>");
                                }
                            }
                        }            
                    });
                }
              	                  
			});
		});
	</script>
	</body>
</html>