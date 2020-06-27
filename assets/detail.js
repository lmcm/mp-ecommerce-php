$(document).ready(function () {
    $("#createPreference").on("click", function () {

        var title = $("#title").text().trim();
        var price = $("#price").html().trim();
        var unit = $("#unit").html().trim();
        var img = $("#img").html().trim();
        price = price.replace("$","");      
        $('#exampleModal').modal('toggle');

        $('#exampleModal').on('shown.bs.modal', function() {
            $(this).find('iframe').attr('src','https://www.w3schools.com/html/html_iframe.asp')
        })  
        /*$('#myModal').modal('toggle');   
        $.ajax({
            type: 'POST',
            url: 'procesar.php',
            data: {
                title: title,
                price: price,
                unit: unit,
                img: img
            },
            contentType: "application/x-www-form-urlencoded",
            dataType: 'html',
            success: function (data) {
                
                //window.location.href = data;


            }
        });*/
    });
});
