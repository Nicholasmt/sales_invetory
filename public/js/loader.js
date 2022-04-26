
function load_discount(ev)
{
    let base_url = $('meta[name="site_url"]').attr("content");

    let value = $(this).attr("value");
     
    alert(value);
    
    $.get(base_url+"/saler/load-discount/"+value, {}, function (data,error) {

         
        if (data) {

            $("#discount").html(data);

        } else 

        {

            $("#discount").html(error);

        }
       
    });
    
}

 
$("body").on("change", "#select", load_discount);