$(document).ready(function() {
	$("#createPreference").on("click", function() {
                                                   
        var title = $("#title").text();
        var price = $("#price").html();
        var unit = $("#unit").html();
        var img = $("#img").html();
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
