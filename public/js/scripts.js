$(document).ready(function() {

	$('body').css('display', 'none');
	$('body').fadeIn(1000);

	$('.link').click(function(event) {
		event.preventDefault();
		newLocation = this.href;
		$('body').fadeOut(1000, newpage);
	});

	function newpage() {
		window.location = newLocation;
	}

});

/* Form Validation */
$().ready(function() {

	$("#loginForm").validate({
		rules: {
			email: {
				required: true,
				email: true
			},
			password: "required"
		},
		messages: {
			email: {
				required: "Please enter an email address",
				email: "Please enter a valid email address"
			},
			password: "Please enter a password"
		}
	});

	$("#registerForm").validate({
		rules: {
			name: "required",
			email: {
				required: true,
				email: true
			},
			password: {
				required: true,
				minlength: 6
			},
			password_confirmation: {
				required: true,
				minlength: 6,
				equalTo: "#password"
			}
		},
		messages: {
			email: {
				required: "Please enter an email address",
				email: "Please enter a valid email address"
			},
			password: "Please enter a password",
			password_confirmation: {
				equalTo: "Passwords do not match"
			}
		}
	});

});
