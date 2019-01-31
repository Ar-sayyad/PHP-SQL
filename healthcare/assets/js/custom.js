
    function medicine() {
        //alert('hello');
//        $.ajax({
//            type: "POST",
//            url: "http://localhost/hospital/hospital/index.php?doctor/GetMedName/",
//            data: {
//                keyword: $(".medicine").val()
//            },
//            dataType: "json",
//            success: function (data) {
//                if (data.length > 0) {
//                    $('#DropdownCountry').empty();
//                    $('.medicine').attr("data-toggle", "dropdown");
//                    $('#DropdownCountry').dropdown('toggle');
//                }
//                else if (data.length == 0) {
//                    $('.medicine').attr("data-toggle", "");
//                }
//                $.each(data, function (key,value) {
//                    if (data.length >= 0)
//                        $('#DropdownCountry').append('<li role="presentation" >' + value['name'] + '</li>');
//                });
//            }
//        });
    }
    $('ul.txtcountry').on('click', 'li a', function () {
        $('.medicine').val($(this).text());
 
    /*$(".medicine").keyup(function () {
        $.ajax({
            type: "POST",
            url: "http://localhost/hospital/hospital/index.php?doctor/GetMedName/",
            data: {
                keyword: $(".medicine").val()
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownCountry').empty();
                    $('.medicine').attr("data-toggle", "dropdown");
                    $('#DropdownCountry').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('.medicine').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownCountry').append('<li role="presentation" >' + value['name'] + '</li>');
                });
            }
        });
    });
    $('ul.txtcountry').on('click', 'li a', function () {
        $('.medicine').val($(this).text());
    });*/
});