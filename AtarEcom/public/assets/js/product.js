
$(document).ready(function(){
    $("#sel_cat").change(function(){
        var cat_id = $(this).find("option:selected").val();
        $.ajax({
            url:'product/sel_sub_ajax/'+cat_id,
            type:"get",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            success:function(response){
                console.log(response.length);
                $('#sel_sub_cat').prop('disabled', false);
                $('#sel_sub_cat').find('option').remove().end()
                $('#sel_sub_cat').append('<option >Select Sub Category</option>')
                for(var i=0;i<response.length;i++){
                    $('#sel_sub_cat').append('<option value="'+response[i]['id']+'">'+response[i]['sub_cat_name']+'</option>')
                }
               
            },
        });
    });
});
