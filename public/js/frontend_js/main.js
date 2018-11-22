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
	})
}) ;


