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
                document.getElementById("pendingReg").innerHTML = data;
				//console.log("It works");
			}
		});
	});
});

