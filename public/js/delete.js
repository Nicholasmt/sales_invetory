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
$("body").on("click", "#delete", delete_user); 