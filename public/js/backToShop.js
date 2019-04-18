$('.backtoshop').click(function(e){


    e.preventDefault();
    var url= baseUrl + "/shopAll";

        $.ajax({
            url: url,
            method: "get",
            data: {

            },
            success: function(data)
            {
                window.location =  url;

            },
            error: function(xhr, status, errMsg)
            {


            }

        })



})