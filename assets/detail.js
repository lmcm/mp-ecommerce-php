$(document).ready(function() {
    
	$("#createPreference").on("click", function() {
        $.ajax({
            type : 'POST',
            url : './procesar.php',
            data : {
                lang : "mike"
            },
            dataType : 'html',
            success : function(data) {
                alert("data " + data)
                
            }
        });
	});
});
