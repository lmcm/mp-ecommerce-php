$(document).ready(function () {
    $("#createPreference").on("click", function () {

        var title = $("#title").text().trim().replace();
        var price = $("#price").html().trim();
        var unit = $("#unit").html().trim();
        var img = $("#img").html().trim();
        console.log("title", title)
        console.log("price", price)
        console.log("unit", unit)
        console.log("img", img)


        $.ajax({
            type: 'POST',
            url: 'procesar.php',
            data: {
                title: title,
                price: price,
                unit: unit,
                img: img
            },
            dataType: 'html',
            success: function (data) {
                console.log("data " , data)
                //window.location.href = data;


            }
        });
    });
});
