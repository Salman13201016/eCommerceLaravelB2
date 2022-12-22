
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
    var count = 1
    $("#add_more_weight").click(function(){
        count = count+1
        var weight_div = '<label for="exampleInputUsername1">Add Weight '+count+'</label><input type="text" class="form-control enable_tag" id="exampleInputUsername1" name ="weight[]" placeholder="Enter Product Weight (E.g, 3ML, 6ML)"/>'

        $(".weight_div").append(weight_div);

        var price_div = '<label for="exampleInputUsername1">Add Price For Weight '+count+'</label><input type="text" class="form-control enable_tag" id="exampleInputUsername1" name ="prod_price[]" placeholder="Enter Product Price (E.g, 3ML, 6ML)" />'
        $(".weight_price_div").append(price_div);
    });

    $("#prod_form").submit(function(e){
        e.preventDefault();
        console.log("yes");
        var formData = new FormData(this);
        var prod_weight =  $("input[name='weight[]']").map(function(){return $(this).val();}).get().toString();
        var prod_price = $("input[name='prod_price[]']").map(function(){return $(this).val();}).get().toString();
        formData.append("weight", prod_weight);
        formData.append("price", prod_price);
        // var cat_id = $("#sel_cat option:selected").val();
        // console.log("yes");
        // var sub_cat_id = $("#sel_sub_cat option:selected").val();
        // var prod_name = $("#prod_title").val();
        // var prod_desc = $("#prod_desc").val();
        // var prod_image = $("#prod_img").val();
        

        $.ajax({
            url:'product',
            type:"post",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(response){
                console.log(response);
               
            },
        });
    });
});
