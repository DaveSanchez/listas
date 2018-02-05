$(document).ready(function(){

    $("input").addClass("myclass2")

    $(".tooltiplink").tooltip();

    $("#btn_save_temp").on("click", function(){
        $("#frm_save_temp").submit();
    });

    $("#btn_save_list").on("click", function(){
        $("#frm_save_list").submit();
    });

    $("#btn_baja_temp").on("click", function(){
        $("#frm_baja_temp").submit();
    });

    $('.datatable').DataTable({
        'searching': true,
        responsive: true
    });


$("body").on("click","#btn_add_temp",function(){
    $(this).attr('disable');
});




    $(".btn-entrada").on("click", function(e){
        e.preventDefault();

        var url = $("#in").val();
        var datatemp = $(this).attr('temp');
        //alert(datatemp);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: url,
            method: "POST",
            data: { values: datatemp }
        }).done(function(data){
            console.log(data);
            var json = $.parseJSON(data);
            if(json.success){
                location.reload();
            }
        });

    });

    $(".btn-salida").on("click", function(e){
        e.preventDefault();

        var url = $("#out").val();
        var datatemp = $(this).attr('temp');
        //alert(datatemp);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: url,
            method: "POST",
            data: { values: datatemp }
        }).done(function(data){
            console.log(data);
            var json = $.parseJSON(data);
            if(json.success){
                location.reload();
            }
        });

    });

    $("body").on("click",".trlink", function(){
        var url = $(this).attr('href');
        window.location.replace(url);
    });

});