$("#instituciones_id").change(function(){
    id = $("#instituciones_id").val();
    $.ajax({
        dataType: 'JSON',
        data:{'id':id},
        url: '{{ route("campuses") }}',
        type: 'POST',
        success:function(data){
           console.log();
           alert();

        },
        error:function(err){
            console.error(err);
        }

     });
});
