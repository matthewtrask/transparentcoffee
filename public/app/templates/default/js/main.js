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
    $("#slider-egs").noUiSlider({
        start: [20, 60],
        step: 1,
        connect: true,
        range: {
            'min': 20,
            'max': 60
        }
    });
    $("#slider-egs").Link('lower').to("-inline-<div class='tooltip2'></div>", function ( value ) {

        // The tooltip HTML is 'this', so additional
        // markup can be inserted here.
        $(this).html(
            '<span>' + Number(value).toString() + "%</span>"
        );
    });
    $("#slider-egs").Link('upper').to("-inline-<div class='tooltip2'></div>", function ( value ) {

        if (value == 60) {
            $(this).html(
                '<span>' + Number(value).toString() + '%+</span>'
            );
        }
        else {
            $(this).html(
                '<span>' + Number(value).toString() + '%</span>'
            );
        }
    });
    $("#slider-gppp").noUiSlider({
        start: [2.5, 4],
        step: .25,
        connect: true,
        range: {
            'min': 2.5,
            'max': 4
        }
    });
    $("#slider-gppp").Link('lower').to("-inline-<div class='tooltip2'></div>", function ( value ) {

        $(this).html(
            '<span>$' + Number(value).toString() + "</span>"
        );
    });
    $("#slider-gppp").Link('upper').to("-inline-<div class='tooltip2'></div>", function ( value ) {

        if (value == 4) {
            $(this).html(
                '<span>$' + Number(value).toString() + '+</span>'
            );
        }
        else {
            $(this).html(
                '<span>$' + Number(value).toString() + '</span>'
            );
        }
    });

    $("input:checkbox").change(function() {
        //var name = $(this).attr('name');
        //var value = $(this).attr('value');
        var data = $("#menu-form").serialize();

        $.ajax({
            url: "ttcoffeesAjax", // link of your "whatever" php
            type: "POST",
            async: true,
            cache: false,
            data: data, // all data will be passed here
            success: function(data){
                document.getElementById("ttcoffees").innerHTML = data.responseText;
            }
        });
        //var ajaxRequest = new XMLHttpRequest();
        //ajaxRequest.onreadystatechange = function() {
        //    if (ajaxRequest.readyState == 4 && ajaxRequest.status == 200) {
                document.getElementById("ttcoffees").innerHTML = ajaxRequest.responseText;
        //    }
        //}
        //ajaxRequest.open("POST",'ttcoffeesAjax',true);
        //ajaxRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        //if ($(this).is(":checked")) {
        //    ajaxRequest.send("name=" + name + "&value=" + value + "&checked=true");
        //}
        //else {
        //    ajaxRequest.send("name=" + name + "&value=" + value + "&checked=false");
        //}
    });
});
