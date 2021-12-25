$(document).ready(function () {
    $('.addToCart').click(function (event) {
    let tabl = $(this).attr('data-tabl');
    let id = $(this).attr('data-id');
    console.log(id);
    console.log(tabl);
    $.ajax({
        url: "/add-to-cart",
        type: "POST",
        data: {
            id: id, tabl: tabl
        },
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (data) => {
            console.log(id);
            console.log(tabl);
            alert("Товар успешно добавлен в корзину!")
        },
        error: function (msg) {
            alert('Ошибка');
        }

    })

    });

});

$(document).ready(function () {
    $('.deleteFromCart').click(function (event) {
        let id = $(this).attr('data-id');
        console.log(id);
        $.ajax({
            url: "/deleteFromCart",
            type: "POST",
            data: {
                id: id
            },
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (data) => {
                console.log(data);
                $("#tablica").html(data);
            },
            error: function (msg) {
                alert('Ошибка');
            }

        })
        return false;
    });

});


$(document).ready(function () {

$("#sch").click(function () {
    let id = $(this).attr("data-id");
    console.log(id);
    $.ajax({
        url: "/cart/schAjax",
        type: "POST",
        data: {
        },
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (data) => {
            // console.log(data);
            $("#cart-count").html(data);
        },
        error: function (msg) {
            alert('Ошибка');
        }
    })
});
});

$(document).ready(function () {

    $("#price").click(function () {
        let id = $(this).attr("data-id");
        console.log(id);
        $.ajax({
            url: "/cart/price",
            type: "POST",
            data: {
            },
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (data) => {
                // console.log(data);
                $("#price-output").html(data);
            },
            error: function (msg) {
                alert('Ошибка');
            }
        })
    });
});
