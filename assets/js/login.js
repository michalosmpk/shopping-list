
// accessing login button by pressing enter
let loginButton = $('#login-button');

$(document).keypress(function (event) {
	if (event.key === 'Enter') {
		event.preventDefault();
		loginButton.click();
	}
}); 

// logging in
function loginUser() {
	let emailInput = $('#login-email-input').val();
	let passwordInput = $('#login-password-input').val();
	let rememberInput = $('#login-remember-input').is(':checked');
	let loginButton = $('#login-button');
	let loginButtonSuccessIcon = $('#login-button-success-icon');
	// alert(rememberInput);
	$.ajax({
		url: 'check-login.php',
		type: 'POST',
		dataType: 'json',
		data: {email: emailInput, password: passwordInput, remember: rememberInput},
		success: function (res) {
			// what happens if the request was completed properly

			// animating button when success
			// ! change to add not toggle!
			loginButton.addClass('login-panel__login-button__animation-success');
			loginButtonSuccessIcon.addClass('login-panel__login-button__success-icon__animation');
			loginButton.on('animationend', function() {
				window.location.href = 'index.php'; 
			});
			console.log('success');
		},
		error: function (xhr, textStatus, errorThrown) {
			// what happens if the request fails.
			// debug: 
			alert(xhr.responseText);

			// setTimeout(function () {
				// 	loginButton.addClass('login-panel__login-button__animation');
			// }, 1);
			
			// animating button when error
			loginButton.addClass('login-panel__login-button__animation-fail');
			loginButton.on("animationend", function () {
				loginButton.removeClass('login-panel__login-button__animation-fail');
			});
			console.log('error');

		}
	})
}