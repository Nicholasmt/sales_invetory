function delete_user(ev)
{
    let base_url = $('meta[name="site_url"]').attr("content");
    let value = $(this).attr("value");
    let id=$(this).val();
     $.get(base_url+"/admin/delete/"+ value, {}, function (data,error) {
     if (data) 
        {
          $("#modal").html(data);
         } else 

        {
          $("#modal").html(error);
        }
     });

}

function delete_company(ev)
{
    let base_url = $('meta[name="site_url"]').attr("content");
    let value = $(this).attr("value");
    let id=$(this).val();
     $.get(base_url+"/admin/deletecompany/"+ value, {}, function (data,error) {
     if (data) 
        {
          $("#modal").html(data);
         } else 

        {
          $("#modal").html(error);
        }
     });
  }

  function delete_category(ev)
{
    let base_url = $('meta[name="site_url"]').attr("content");
    let value = $(this).attr("value");
    let id=$(this).val();
     $.get(base_url+"/admin/deletecategory/"+ value, {}, function (data,error) {
     if (data) 
        {
          $("#modal").html(data);
         } else 

        {
          $("#modal").html(error);
        }
     });
  }
$("body").on("click", "#deleteuser", delete_user); 
$("body").on("click", "#deletecompany", delete_company); 
$("body").on("click", "#deletecategory", delete_category); 