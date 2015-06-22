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
  //
    $('#header-logo').hover(function(){
        this.src = "app/templates/default/img/Transparent-Trade-Tan-Large-08-10.png";
    }, function(){
        this.src = "app/templates/default/img/Transparent%20Trade%20White-08-09.png";
    });
  //Slider on TT Coffees
    $('.accordion-navigation').click(function() {
        if ($(this).children().children().eq(1).hasClass('fa-plus-circle')) {
            $(this).children().children().eq(1).addClass('fa-minus-circle');
            $(this).children().children().eq(1).removeClass('fa-plus-circle');
        }
        else {
            $(this).children().children().eq(1).addClass('fa-plus-circle');
            $(this).children().children().eq(1).removeClass('fa-minus-circle');
        }
    });
});
