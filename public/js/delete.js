$('.delete').click(function(e){

    //alert(baseUrl);

    var id = $(this).attr('data-id');
    var url= baseUrl + "/delete/" + id;
    e.preventDefault();

    //alert(url);


    $.ajax({
        url: url,
        method: "get",
        data: {
            //id: id,
            //csrf: csrf
            // nece da radi post

        },
        success: function(data)
        {
            alert("You are successfuly delete item from card");
            window.location =  baseUrl + "/card";
        },
        error: function(xhr, status, errMsg)
        {
            alert("SRY ERROR");

        }

    })



})