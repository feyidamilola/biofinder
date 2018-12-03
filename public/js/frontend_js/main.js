/*price range*/

$().ready(function(){
	// alert ('test');
	$('#registerForm').validate({
		rules:{
			name: {
				required: true,
				minlength: 6,
				accept: "[a-zA-Z]+"
			},
			password: {
				required:true,
				minlength: 6
			},
			email: {
				required: true,
				email: true,
				remote: "/check-email"
			}
		},
		messages: {
			name: {
				required: "Please enter your name",
				minlength: "Your name has to be at least 6 characters long",
				accept: "Your name cannot contain any numbers"
			}, 
			password: {
				required: "Please provide your password",
				minlength: "Password must be at least 6 characters long"
			},
			email: {
				required: "Email address is required",
				email: "Please enter a valid email address",
				remote: "Email already exists"
			}
		}
	});

	$('#loginForm').validate({
		rules:{
			
			password: {
				required:true
			},
			email: {
				required: true,
				email: true
			}
		},
		messages: {
			
			password: {
				required: "Please provide your password"
			},
			email: {
				required: "Email address is required",
				email: "Please enter a valid email address"
			}
		}
	});

	$('#profile').validate({
		rules:{
			name: {
				required: true,
				minlength: 6,
				accept: "[a-zA-Z]+"
			},
			address: {
				required: true,
				minlength: 6
			},
			state: {
				required: true,
				minlength: 3
			},
			email: {
				required: true,
				email: true,
				remote: "/check-email"
			}
		},
		messages: {
			name: {
				required: "Please enter your name",
				minlength: "Your name has to be at least 6 characters long",
				accept: "Your name cannot contain any numbers"
			}, 
			address: {
				required: "Please provide your address",
				minlength: "Address must be at least 6 characters long"
			},
			state: {
				required: "Please provide your state",
				minlength: "State must be at least 3 characters long"
			},
			email: {
				required: "Email address is required",
				email: "Please enter a valid email address",
				remote: "Email already exists"
			}
		}
	});

	$('#update-password').validate({
		rules:{
			currentpassword: {
				required:true,
				minlength: 6
			},
			password: {
				required: true,
				minlength: 6
			},
			confirmpassword: {
				required:true,
				minlength: 6,
				equalTo: "#password"
			}
		},
		messages: {
			currentpassword: {
				required: "Please provide your current password",
				minlength: "Password must be at least 6 characters long"
			},
			password: {
				required: "Please provide your new password",
				minlength: "Password must be at least 6 characters long"
			},
			password: {
				required: "Please confirm your password",
				minlength: "Password must be at least 6 characters long"
			},
		}
	});
	
}) ;


