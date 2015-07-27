$(document).ready(function(){
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
                //window.location.reload();
                document.getElementById("pendingReg").innerHTML = data;
				//console.log("It works");
			}
		});
	});

    $('#archiveForm').submit(function(){
        var archivedCoffeeIds = $('input:checked');
        var data = '';
        for (var = i; i < archivedCoffeeIds.length; i++){
            if(i == 0){
                data += 'archive'
            }
            else {
                data += '&archive'
            }
            data += 1 + '=' + archivedCoffeeIds[i].name;
        }

        $.ajax({
            url: "/archiveAjax",
            type: "POST",
            async: true,
            cache: false,
            data: data,
            success: function(data){
                document.getElementById("archiveCoffee").innerHTML = data;
                console.log("this works");
            }
        });
    });

    $('#activeForm').submit(function(){
        var activeCoffeeIds = $('input:checked');
        var data = '';
        for (var = i; i < activeCoffeeIds.length; i++){
            if (i == 0){
                data += 'active'
            }
            else {
                data += '&active'
            }
            data +=1 + '=' + activeCoffeeIds[i].name;
        }
        $.ajax({
           url: '/activeAjax',
            type: "POST",
            async: true,
            cache: false,
            data: data,
            success: function(data){
                document.getElementById('activeCoffee').innerHTML - data;
                console.log('this works');
            }
        });
    });
});

