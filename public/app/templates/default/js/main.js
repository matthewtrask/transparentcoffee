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
            fontRatio: 26
        });
    }
    flowText();
  $('#submitButton').click(function(e){
      $(document).foundation('alert','events');
      e.preventDefault();
      var data = $('#contactForm').serialize();
     $.ajax({
       url: 'sendContact',
       type: 'POST',
       data: data,
         async: true,
         cache: false,
       success: function(data){
           document.getElementById('alert-message').innerHTML = data;
           $(document).foundation('alert','events');
       },
       error: function(data){
           document.getElementById('alert-message').innerHTML = data;
          $(document).foundation('alert','events');
        }
     });
  });

    $('.selectall').on('click', function() {
        if (this.name == 'selectall') {
            $("#panel1 > input").each(function () {
                this.checked = true;
            });
            $('.selectall').each(function () {
                this.name = 'deselectall';
                this.value = 'Deselect All';
            });
        }
        else {
            $("#panel1 > input").each(function () {
                this.checked = false;
            });
            $('.selectall').each(function () {
                this.name = 'selectall';
                this.value = 'Select All';
            });
        }
    });
    $('#header-logo').hover(function(){
        this.src = "/app/templates/default/img/ttc-bottom-page.png";
    }, function(){
        this.src = "/app/templates/default/img/ttc-header-logo.png";
    });
    $('.panel-header').click(function() {
        if ($(this).children().eq(1).hasClass('fa-plus-circle')) {
            $(this).children().eq(1).addClass('fa-minus-circle');
            $(this).children().eq(1).removeClass('fa-plus-circle');
        }
        else {
            $(this).children().eq(1).addClass('fa-plus-circle');
            $(this).children().eq(1).removeClass('fa-minus-circle');
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
        else if (sort == 'Order By') {
            data += '&sort=orderby';
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
        else if (sort == 'Order By') {
            data += '&sort=orderby';
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
        else if (sort == 'Order By') {
            data += '&sort=orderby';
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
        else if (sort == 'Order By') {
            data += '&sort=orderby';
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
        else if (sort == 'Order By') {
            data += '&sort=orderby';
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
$(document).on('click', '.extra-coffee', function(event){
    var number = this.name;
    var data = 'number=' + number;
    $.ajax({
        url: "extraCoffeeAjax",
        type: "POST",
        async: true,
        cache: false,
        data: data, // all data will be passed here
        success: function(data){
            document.getElementById("previous-coffee-button").remove();
            //var oldhtml = document.getElementById("ttcoffees").innerHTML;
            var newcontent = document.createElement('div');
            newcontent.innerHTML = data;
            while (newcontent.firstChild) {
                document.getElementById("extra-coffees").appendChild(newcontent.firstChild);
            }
        }
    });
});
$(document).on('click', '.remove-coffee', function(event){
    var number = this.name;
    $.ajax({
        //url: "removeCoffeeAjax",
        //type: "POST",
        async: true,
        cache: false,
        //data: data, // all data will be passed here
        success: function() {
            document.getElementById("coffee-" + number).remove();
            document.getElementById("extra-coffee").name = number;
            if (number > 2) {
                document.getElementById("remove-coffee").name = number - 1;
                document.getElementById("remove-coffee").innerHTML = 'Remove Coffee #' + (number - 1);
            }
            else {
                document.getElementById("remove-coffee").remove();
            }
        }
    });
});