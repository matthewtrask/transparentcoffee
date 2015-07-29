$(document).ready(function(){
    $(document).foundation();
    //$('#archiveUpdateForm').foundation('reveal', 'open', {
    //    //root_element: 'archiveUpdateForm'
    //});
    //$('a.reveal-link').click( function() {
    //    $(document).foundation();
    //});
    //$('.update-btn').click(function() {
    //    $(document).foundation();
    //});
	//Attach click handler to the approve button
	$('#pendingForm').submit( function(){
        // assign variable to the attribute to the tr
        //$("input:checkbox[name=type]:checked").each(function(){
        //    yourArray.push($(this).val());
        //});
		var approvedCoffeeIds = $('input:checked');
        var data = '';
        for (var i = 0; i < approvedCoffeeIds.length; i++) {
            if (i == 0) {
                data += 'approve'
            }
            else {
                data += '&approve'
            }
            data += i + '=' + approvedCoffeeIds[i].name;
        }

        $.ajax({
			url: "/pendingAjax",
			type: "POST",
            async: true,
            cache: false,
			data: data,
			success: function(data){
                window.location.reload();
                //document.getElementById("pendingReg").innerHTML = data;
				//console.log("It works");
			}
		});
	});

    $('#archiveForm').submit(function(){
        var archivedCoffeeIds = $('input:checked');
        var data = '';
        for (var i = 0; i < archivedCoffeeIds.length; i++){
            if(i == 0){
                data += 'archive'
            }
            else {
                data += '&archive'
            }
            data += i + '=' + archivedCoffeeIds[i].name;
        }

        $.ajax({
            url: "/archiveAjax",
            type: "POST",
            async: true,
            cache: false,
            data: data,
            success: function(){
                window.location.reload();
                //document.getElementById("archiveCoffee").innerHTML = data;
                //console.log("this works");
            }
        });
    });

    $('#activeForm').submit(function(){
        var activeCoffeeIds = $('input:checked');
        var data = '';
        for (var i = 0; i < activeCoffeeIds.length; i++){
            if (i == 0){
                data += 'active'
            }
            else {
                data += '&active'
            }
            data += i + '=' + activeCoffeeIds[i].name;
        }
        $.ajax({
           url: '/activeAjax',
            type: "POST",
            async: true,
            cache: false,
            data: data,
            success: function(){
                window.location.reload();
                //document.getElementById('activeCoffee').innerHTML = data;
                //console.log('this works');
            }
        });
    });
    $('.pending-submit').click(function() {
        var id = this.name;
        var data = $('#pendingUpdateForm-' + id).serialize();
        $.ajax({
            url: '/submitUpdate',
            type: "POST",
            async: true,
            cache: false,
            data: data,
            success: function(){
            }
        });
    });
    $('.archive-submit').click(function() {
        var id = this.name;
        var data = $("#archiveUpdateForm-" + id).serialize();
        $.ajax({
            url: '/submitUpdate',
            type: "POST",
            async: true,
            cache: false,
            data: data,
            success: function(){
            }
        });
    });
    $('.active-submit').click(function() {
        var id = this.name;
        var data = $('#activeUpdateForm-' + id).serialize();
        $.ajax({
            url: '/submitUpdate',
            type: "POST",
            async: true,
            cache: false,
            data: data,
            success: function(){
            }
        });
    });
    $('.pending-roaster-btn').click(function(event) {
        event.preventDefault();
        var id = this.name;
        $.ajax({
            url: '/roasterAjax',
            type: "POST",
            async: true,
            cache: false,
            success: function(data){
                document.getElementById('pending-roaster-section-' + id).innerHTML = data;
            }
        });
    });
    $('.archive-roaster-btn').click(function(event) {
        event.preventDefault();
        var id = this.name;
        $.ajax({
            url: '/roasterAjax',
            type: "POST",
            async: true,
            cache: false,
            success: function(data){
                document.getElementById('archive-roaster-section-' + id).innerHTML = data;
            }
        });
    });
    $('.active-roaster-btn').click(function(event) {
        event.preventDefault();
        var id = this.name;
        $.ajax({
            url: '/roasterAjax',
            type: "POST",
            async: true,
            cache: false,
            success: function(data){
                document.getElementById('active-roaster-section-' + id).innerHTML = data;
            }
        });
    });
});

