$('.deleteMenu').click(function(e){

    //alert(baseUrl);

    var id = $(this).attr('data');
    var url= baseUrl + "/adminmenu/" + id;
    e.preventDefault();

    //alert(url);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        method: "delete",
        data: {
            //id: id,
            //csrf: csrf
            // nece da radi post

        },
        success: function(data)
        {
            var podaci="";
            var br=0;
            console.log(data.data);
            $.each(data.data, function(index, value){


                podaci+="" +
                    " <tr>\n" +
                    "\n" +
                    "                    <td>"+value.idMenu+"</td>\n" +
                    "                    <td>"+value.href+"</td>\n" +
                    "                    <td>"+value.menuName+"</td>\n" +
                    "\n" +
                    "                    <td> <a href=\"http://localhost/shopfirst/public/adminmenu"+value.idMenu+"/edit\">\n" +
                    "                            <i class=\"material-icons\">update</i>\n" +
                    "                        </a>\n" +
                    "                    </td>\n" +
                    "                    <td>\n" +
                    "\n" +
                    "                        <a href=\"#\" >\n" +
                    "\n" +
                    "                            <i class=\"material-icons deleteMenu\" data=\""+value.idMenu+"\"> delete_forever</i>\n" +
                    "                        </a>\n" +
                    "                    </td>\n" +
                    "                </tr>";

                br+=1;


            });

            $('#menu').html(podaci);

            //console.log(data);
        },
        error: function(xhr, status, errMsg)
        {
            alert("SRY ERROR");

        }

    })



})