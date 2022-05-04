
function load_discount(ev)
{
    let base_url = $('meta[name="site_url"]').attr("content");

    let value = $(this).attr("value");
    let id=$(this).val();
     
    
    
    $.get(base_url+"/saler/load-discount/"+ id, {}, function (data,error) {

         
        if (data) {

            $("#discount").html(data);

        } else 

        {

            $("#discount").html(error);

        }
       
    });
    
}

function load_search(ev)
{
    let base_url = $('meta[name="site_url"]').attr("content");

    //let value = $(this).attr("value");
    let value=$("#keyword").val();
    let id=$(this).val();
     
    
    
    $.get(base_url+"/saler/search-result/"+ value, {}, function (data,error) {

         
        if (data) {

            $("#result").html(data);

        } else 

        {

            $("#result").html(error);

        }
       
    });
    
}

$("body").on("click", "#Search", load_search); 
$("body").on("change", "#select", load_discount);
