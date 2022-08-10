
function load_discount(ev)
{
    let base_url = $('meta[name="site_url"]').attr("content");
     let value = $(this).attr("value");
    let id=$(this).val();
     $.get(base_url+"/saler/load-discount/"+ id, {}, function (data,error) {
     if (data) 
        {
          $("#discount").html(data);
         } else 

        {
          $("#discount").html(error);
        }
     });
    
}

function load_product(ev)
{
    let base_url = $('meta[name="site_url"]').attr("content");
    let value = $(this).attr("value");
    let id=$(this).val();
     $.get(base_url+"/saler/load-product/"+ id, {}, function (data,error) {
     if (data) 
        {
          $("#product").html(data);
         } else 
        {
          $("#product").html(error);
        }
     });
 }

 function load_customer(ev)
 {
     let base_url = $('meta[name="site_url"]').attr("content");
     let value=$("#phone").val();
     let id=$(this).val();
      $.get(base_url+"/saler/load-customer/"+ value, {}, function (data,error) {
      if (data) 
         {
           $("#load-customer").html(data);
          } else 
         {
           $("#load-customer").html(error);
         }
      });
  }

function load_search(ev)
{
    let base_url = $('meta[name="site_url"]').attr("content");
    let value=$("#keyword").val();
    let id=$(this).val();
     $.get(base_url+"/saler/search-result/"+ value, {}, function (data,error) {
     if (data) 
          {
             $("#result").html(data);
          } else 
         {
            $("#result").html(error);
         }
     });
 }

$("body").on("click", "#Search", load_search); 
$("body").on("change", "#select-product", load_discount);
$("body").on("change", "#select-category", load_product);
$("body").on("click", "#customer", load_customer);
