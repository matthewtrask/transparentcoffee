// Ajax call to post data to controller
$(document).ready(function(){
    //FLOW TYPE
    function flowText() {
        $(".roaster_name").flowtype({
            maximum: 800,
            minFont: 13,
            maxFont: 22,
            fontRatio: 17
        });
        $(".coffee_name").flowtype({
            maximum: 800,
            minFont: 10,
            maxFont: 16,
            fontRatio: 22
        });
        $(".TTCList li").flowtype({
            maximum: 800,
            minFont: 8,
            maxFont: 14,
            fontRatio: 22
        });
    }
    flowText();
  //$('#submitButton').click(function(e){
  //   $.ajax({
  //     url: 'http://192.168.33.10/contact',
  //     type: 'POST',
  //     data: '#contactForm',
  //     success: function(){
  //       alert('Successfully sent!');
  //     },
  //     error: function(){
  //       alert('There was an error sending your information. Please try again.');
  //     }
  //   });
  //   e.preventDefault();
  //});
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
    $(".slider-egs").noUiSlider({
        start: [15, 60],
        step: 1,
        connect: true,
        range: {
            'min': 15,
            'max': 60
        }
    });
    $(".slider-egs").Link('lower').to("-inline-<div class='tooltip2'></div>", function ( value ) {

        // The tooltip HTML is 'this', so additional
        // markup can be inserted here.
        $(this).html(
            '<span>' + Number(value).toString() + "%</span>"
        );
    });
    $(".slider-egs").Link('upper').to("-inline-<div class='tooltip2'></div>", function ( value ) {

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
    $(".slider-gppp").noUiSlider({
        start: [2.5, 5],
        step: .25,
        connect: true,
        range: {
            'min': 2.5,
            'max': 5
        }
    });
    $(".slider-gppp").Link('lower').to("-inline-<div class='tooltip2'></div>", function ( value ) {

        $(this).html(
            '<span>$' + Number(value).toString() + "</span>"
        );
    });
    $(".slider-gppp").Link('upper').to("-inline-<div class='tooltip2'></div>", function ( value ) {

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
    $(".slider-egs").Link('lower').to($(".egs-lower"));
    $(".slider-egs").Link('upper').to($(".egs-upper"));
    $(".slider-gppp").Link('lower').to($(".gppp-lower"));
    $(".slider-gppp").Link('upper').to($(".gppp-upper"));



    $("input:checkbox").change(function() {
        var sort = $(".dropdown-btn").text();
        var arrow = $(".arrow-btn").attr('id');

        if ($("#menu-form").is(":visible")) {
            var data = $("#menu-form").serialize();
        }
        else {
            var data = $("#mobile-menu-form").serialize();
        }
        if (sort == 'Green Price Per Pound') {
            data += '&sort=GPPP';
        }
        else if (sort == 'Effective Grower Share') {
            data += '&sort=EGS';
        }
        else if (sort == 'Default') {
            data += '&sort=Default';
        }
        else {
            data += '&sort=' + sort;
        }
        data += '&arrow=' + arrow;
        $.ajax({
            url: "ttcoffeesAjax",
            type: "POST",
            async: true,
            cache: false,
            data: data, // all data will be passed here
            success: function(data){
                document.getElementById("ttcoffees").innerHTML = data;
                flowText();
                $(document).foundation()
            }
        });
    });
    $(".slider-egs").on({change: function() {
        var sort = $(".dropdown-btn").text();
        var arrow = $(".arrow-btn").attr('id');

        if ($("#menu-form").is(":visible")) {
            var data = $("#menu-form").serialize();
        }
        else {
            var data = $("#mobile-menu-form").serialize();
        }
        if (sort == 'Green Price Per Pound') {
            data += '&sort=GPPP';
        }
        else if (sort == 'Effective Grower Share') {
            data += '&sort=EGS';
        }
        else if (sort == 'Default') {
            data += '&sort=Default';
        }
        else {
            data += '&sort=' + sort;
        }
        data += '&arrow=' + arrow;
        $.ajax({
            url: "ttcoffeesAjax",
            type: "POST",
            async: true,
            cache: false,
            data: data, // all data will be passed here
            success: function(data){
                document.getElementById("ttcoffees").innerHTML = data;
                flowText();
                $(document).foundation()
            }
        });
    }
    });
    $(".slider-gppp").on({change: function() {
        var sort = $(".dropdown-btn").text();
        var arrow = $(".arrow-btn").attr('id');

        if ($("#menu-form").is(":visible")) {
            var data = $("#menu-form").serialize();
        }
        else {
            var data = $("#mobile-menu-form").serialize();
        }
        if (sort == 'Green Price Per Pound') {
            data += '&sort=GPPP';
        }
        else if (sort == 'Effective Grower Share') {
            data += '&sort=EGS';
        }
        else if (sort == 'Default') {
            data += '&sort=Default';
        }
        else {
            data += '&sort=' + sort;
        }
        data += '&arrow=' + arrow;
        $.ajax({
            url: "ttcoffeesAjax",
            type: "POST",
            async: true,
            cache: false,
            data: data, // all data will be passed here
            success: function(data){
                document.getElementById("ttcoffees").innerHTML = data;
                flowText();
                $(document).foundation()
            }
        });
    }
    });
    $(document).on('click', '.sort-dropdown', function () {
        var sort = $(this).text();
        var arrow = $(".arrow-btn").attr('id');
        if ($("#menu-form").is(":visible")) {
            var data = $("#menu-form").serialize();
        }
        else {
            var data = $("#mobile-menu-form").serialize();
        }
        if (sort == 'Green Price Per Pound') {
            data += '&sort=GPPP';
        }
        else if (sort == 'Effective Grower Share') {
            data += '&sort=EGS';
        }
        else if (sort == 'Default') {
            data += '&sort=Default';
        }
        else {
            data += '&sort=' + sort;
        }
        data += '&arrow=' + arrow;
        $.ajax({
            url: "ttcoffeesAjax",
            type: "POST",
            async: true,
            cache: false,
            data: data, // all data will be passed here
            success: function (data) {
                document.getElementById("ttcoffees").innerHTML = data;
                flowText();
                $(document).foundation();
            }
        });
    });
    $(document).on('click', '.arrow-btn', function () {
        var sort = $(".dropdown-btn").text();
        var oldArrow = $(".arrow-btn").attr('id');
        if (oldArrow == 'up') {
            var arrow = 'down';
        }
        else {
            var arrow = 'up';
        }
        if ($("#menu-form").is(":visible")) {
            var data = $("#menu-form").serialize();
        }
        else {
            var data = $("#mobile-menu-form").serialize();
        }
        if (sort == 'Green Price Per Pound') {
            data += '&sort=GPPP';
        }
        else if (sort == 'Effective Grower Share') {
            data += '&sort=EGS';
        }
        else if (sort == 'Default') {
            data += '&sort=Default';
        }
        else {
            data += '&sort=' + sort;
        }
        data += '&arrow=' + arrow;
        $.ajax({
            url: "ttcoffeesAjax",
            type: "POST",
            async: true,
            cache: false,
            data: data, // all data will be passed here
            success: function (data) {
                document.getElementById("ttcoffees").innerHTML = data;
                flowText();
                $(document).foundation();
            }
        });
    });
});
