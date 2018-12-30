<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Contact Form</title>
		<link rel="stylesheet" href="css/style-global.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<script src="js/jquery-3.3.1.js"></script>
	</head>
	<body>
		<div class="container">
			<form id="contact-form" class="contact-form" action="">
				<h1 class="contact-form__title">Contact Form</h1>
				<input required type="text" id="name" name="name" placeholder="Name and Surname" class="contact-form__text-input">
				<span class="name-error"></span>
				<input required type="email" id="email" name="email" placeholder="email@address.com" class="contact-form__text-input">
				<span class="email-error"></span>
				<textarea required rows="4" id="message" name="message" placeholder="Please write Your request here." class="contact-form__textarea"></textarea>
				<span class="message-error"></span>
				<input type="submit" id="submit" class="contact-form__submit" value="Send Request">
				<label id="info"></label>
				<label id="query-info"></label>
				<label id="confirmation-info"></label>
				<label id="notification-info"></label>
			</form>
			<p id="output" class="output"></p>
		</div>
	</body>

	<link href="https://fonts.googleapis.com/css?family=Merriweather:300,700" rel="stylesheet">

	<script src="js/ajax-magic.js" type="text/javascript"></script>
</html>
