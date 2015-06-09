// Ajax call to post data to controller
$(document).ready(function(){
  $('#submitButton').click(function(e){
    $.ajax({
      url: 'http://192.168.33.10/contact',
      type: 'POST',
      data: '#contactForm',
      success: function(){
        alert('Successfully sent!');
      },
      error: function(){
        alert('There was an error sending your information. Please try again.');
      }
    });
    e.preventDefault();
  });
});
