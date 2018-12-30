$(document).ready(function() {

  var form = $('#contact-form'),
    name = $('#name'),
    email = $('#email'),
    message = $('#message'),
    info = $('#info'),
    submit = $("#submit");

  info.html('').slideUp();
  $('#query-info').slideUp();
  $('#confirmation-info').slideUp();
  $('#notification-info').slideUp();
  $('#output').css('display', 'none');

  form.on('input', '#email, #name, #message', function() {
    $(this).css('border-color', 'black');
    info.html('').slideUp();
    $('#query-info').slideUp();
    $('#confirmation-info').slideUp();
    $('#notification-info').slideUp();
    $('#output').css('display', 'none');
  });

  submit.on('click', function(e) {
    e.preventDefault();
    if (validate()) {
      $.ajax({
        type: "POST",
        url: "process.php",
        data: form.serialize(),
        dataType: "json",
        success: function(data) {
          if(!data.errors && data.success) {
            var textToPrint = '<span>Your message:</span> Name: ' + name.val() + '<br> Email: ' + email.val() + '<br> Message: ' + message.val();
            $('#output').html(textToPrint).css('display', 'block').slideDown();
            email.val('');
            name.val('');
            message.val('');

            var query = data.query;
            var confirmation = data.confirmation;
            var notification = data.notification;

            if (query.success) {
              $('#query-info').html(query.message).css('color', '#045600').slideDown();
            } else {
              $('#query-info').html(query.message).css('color', 'red').slideDown();
            }

            if (confirmation.success) {
              $('#confirmation-info').html(confirmation.message).css('color', '#045600').slideDown();
            } else {
              $('#confirmation-info').html(confirmation.message).css('color', 'red').slideDown();
            }

            if (notification.success) {
              $('#notification-info').html(notification.message).css('color', '#045600').slideDown();
            } else {
              $('#notification-info').html(notification.message).css('color', 'red').slideDown();
            }
          } else {
            info.html('Something is wrong with the data You provided!').css('color', 'red').slideDown();
          }
        },
        error: function(data) {
          console.log(data);
          info.html("Something went terribly wrong! Please reload and try again, if this doesn't help, then contact the creator of this form").css('color', 'red').slideDown();
        }
      });
    }
  });

  function validate() {
    var valid = true;
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!regex.test(email.val())) {
      email.css('border-color', 'red');
      valid = false;
    }
    if ($.trim(name.val()) === "") {
      name.css('border-color', 'red');
      valid = false;
    }
    if ($.trim(message.val()) === "") {
      message.css('border-color', 'red');
      valid = false;
    }

    return valid;
  }

});
