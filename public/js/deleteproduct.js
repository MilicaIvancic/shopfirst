$('.deleteProduct').click(function(e){

    //alert(baseUrl);

    var id = $(this).attr("data");
    //var csrf = $(this).attr("csrf");
    var url= "http://localhost/shopfirst/public/adminproduct/delete/" + id;
    e.preventDefault();

    alert(id);


    $.ajax({
        url: url,
        method: "get",
            data: {


            //csrf: csrf
            // nece da radi post

        },
        success: function(data)
        {
            var podaci="";
            var br=0;
            console.log(data.data);
            $.each(data.data, function(index, value){


                podaci+= "<tr>\n" +
                    "\n" +
                    "                    <td>"+value.idProduct+"</td>\n" +
                    "                    <td>"+value.nameProduct+"</td>\n" +
                    "                    <td> <img src=\"images/"+value.image+"\" alt=\""+value.alt+"\" class=\"figure-img\"> </td>\n" +
                    "                    <td>"+value.description+"</td>\n" +
                    "                    <td>"+value.date+"</td>\n" +
                    "                    <td>$"+value.articlePrice+"</td>\n" +
                    "                    <td>"+value.name+"</td>\n" +
                    "\n" +
                    "                    <td> <a href=\"#\">\n" +
                    "                            <i class=\"material-icons\" data="+value.idProduct+">update</i>\n" +
                    "                        </a>\n" +
                    "                    </td>\n" +
                    "                    <td>\n" +
                    "\n" +
                    "                        <a href=\"#\" >\n" +
                    "\n" +
                    "                            <i class=\"material-icons deleteProduct\" data="+value.idProduct+"> delete_forever</i>\n" +
                    "                        </a>\n" +
                    "                    </td>\n" +
                    "                </tr>";

                br+=1;


            });

            $('#products').html(podaci);

            //console.log(data);
        },
        error: function(xhr, status, errMsg)
        {
            alert("SRY ERROR");

        }

    })



})