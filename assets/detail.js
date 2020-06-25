$(document).ready(function () {
    $("#createPreference").on("click", function () {

        var title = $("#title").text().replace("$").trim();
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
            data: JSON.stringify({
                title: title,
                price: price,
                unit: unit,
                img: img
            }),
            contentType: "pplication/x-www-form-urlencoded",
            dataType: 'html',
            success: function (data) {
                console.log("data " , data)
                //window.location.href = data;


            }
        });
    });
});
