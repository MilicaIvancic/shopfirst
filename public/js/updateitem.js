$('.update').click(function(e){

    //alert(baseUrl);
    //var p = $('#sum').val();
    var id = $(this).attr('data-ids');
    var url= baseUrl + "/updateCardItem/" +id;
    e.preventDefault();

    //alert(pr);
    //alert(pr);


        $.ajax({
            url: url  ,
            method: "get",
            data: {

            },
            success: function(data)
            {

                window.location =  baseUrl + "/card";
            },
            error: function(xhr, status, errMsg)
            {
                alert(errMsg);

            }

        })



})