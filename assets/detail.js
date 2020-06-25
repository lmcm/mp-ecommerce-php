$(document).ready(function() {
	$("#createPreference").on("click", function() {
                                                   
        var title = $("#title").text().trim;
        var price = $("#price").html().trim;
        var unit = $("#unit").html().trim;
        var img = $("#img").html().trim;
        console.log("title",title)
        console.log("price",price)
        console.log("unit",unit)
        console.log("img",img)


        /*$.ajax({
            type : 'POST',
            url : 'procesar.php',
            data : {
                lang : "mike"
            },
            dataType : 'html',
            success : function(data) {
                alert("data " + data)
                
            }
        });*/
	});
});
