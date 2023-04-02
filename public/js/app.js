// get-Thana-according-to-District
$('.district_id').on('change',function(){
    var districtID = $(this).val();
    if(districtID)
    {
        $.ajax({
            url : '/student/get/thana/'+districtID,
            type : "GET",
            dataType : "json",
            success:function(data)
            {
            console.log(data);
                $('.thana_id').empty();
                $('.thana_id').append('<option value="">--Select Area--</option>');
                $.each(data, function(key,value){
                    $('.thana_id').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                });
            }
        });
    }
    else
    {
        $('.thana_id').empty();
    }

})
