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


    $("body").on("click",".btn-addtemp", function(e){
        e.preventDefault();

        var url = $("#storetemp").val();
        var datatemp = $(this).closest('tr').attr('temp');

        if(temp_exist(datatemp)){

            alert('Este temporal ya existe');
            

        }else{
        
        /*$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: url,
            method: "POST",
            data: { values: datatemp },
        }).done(function(data){
            console.log(data);
            var json = $.parseJSON(data);
            if(json.success){
                alert('Se agrego temporal a la lista');
            }else {
                alert('algo salio mal');
            }
        });*/
    }

    });


    function temp_exist(data){

        var url = $("#check").val();
        var datatemp = data;
        var state = false;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: url,
            method: "POST",
            data: { values: datatemp },
            async: false,
        }).done(function(data){
            console.log(data);
            var json = $.parseJSON(data);
            
            if(json.success){
                alert('ya existe');
                
            }else {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        
                $.ajax({
                    url: $("#storetemp").val(),
                    method: "POST",
                    data: { values: datatemp },
                }).done(function(data){
                    console.log(data);
                    var json = $.parseJSON(data);
                    if(json.success){
                        alert('Se agrego temporal a la lista');
                        location.reload();
                    }else {
                        alert('algo salio mal');
                    }
                });
            }
        });

    }




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