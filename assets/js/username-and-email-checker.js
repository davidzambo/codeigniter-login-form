$(document).ready(function(){
  $('#username').on('blur', function () {

    $.ajax({
      url: 'index.php/registration/check_username',
      type: 'post',
      data: {
        'username': $('#username').val(),
      },
      success: function (response) {
        if (response != 0)
          $('#username_in_use').removeClass('d-none');
        else
          $('#username_in_use').addClass('d-none');          
      }

    });
  
  }); //onblur
});

$(document).ready(function () {
  $('#email').on('blur', function () {

    $.ajax({
      url: 'index.php/registration/check_email/',
      type: 'post',
      data: {
        'email': $('#email').val(),
      },
      success: function (response) {
        if (response != 0)
          $('#email_in_use').removeClass('d-none');
        else
          $('#email_in_use').addClass('d-none');          
      }

    });

  }); //onblur
});
