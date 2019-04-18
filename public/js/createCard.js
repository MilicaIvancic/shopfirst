$('.createCard').click(function(e){

    //alert(baseUrl);
    var url= baseUrl + "/createCard";
    e.preventDefault();
    var card = $(this).attr('data-id');
    //alert(csrf);
    var x = confirm("Da li ste sigurni?");
    if(x)
    {
        $.ajax({
            url: url,
            method: "get",
            data: {
                card: card,
            },
            success: function(data)
            {
                alert("You are successfuly create card");
                window.location =  baseUrl + "/card";
            },
            error: function(xhr, status, errMsg)
            {
                alert("SRY ERROR");

            }

        })
    }


})