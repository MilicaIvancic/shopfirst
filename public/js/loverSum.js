$('.loversum').click(function(e){

    //alert(baseUrl);
    var id = $(this).attr('data-idsi');
    var url= baseUrl + "/loverSum/" +id;
    e.preventDefault();


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
            alert("SRY ERROR");

        }

    })



})