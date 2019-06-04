var link_id;

function select_func(val) {
    link_id=val;
    var element = document.getElementById("btn_fetch");
    if (val != "na") {
        $("#btn_fetch").text("Fetch");
        $('#btn_fetch').removeClass("btn btn-outline-success");
        $('#btn_fetch').addClass("btn btn-outline-primary");
        element.removeAttribute("disabled");
    } else {
        element.setAttribute("disabled", "true");
        $('#btn_fetch').removeClass("btn btn-outline-success");
        $('#btn_fetch').addClass("btn btn-outline-primary");
        $("#btn_fetch").text("Fetch");
    }
}


$(document).ready(function () {
    $(document).ready(function () {
        $('#_loader').hide();
    });

    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $("#btn_fetch").click(function (e) { 
        e.preventDefault();
        $("#btn_fetch").text("");
        $("#btn_fetch").append("<div id='loader' class='spinner-grow spinner-grow-sm'></div> Fetching..");



        $.ajax({
            method: "POST",
            url: "fetch_details.php",
            data: { Link_id: link_id },
            success: function (status) {
                var obj = JSON.parse(status);
                $('#link_name').text(obj.name);
                $('#link_url').text(obj.url);
                $('#link_id').text(obj.id);
            }
    
        });


        $.ajax({
            method: "POST",
            url: "fetch_data.php",
            data: { Link_id: link_id },
            success: function (status) {
                $('#data_table').removeClass("invisible");
                $('#data_container').html(status);
                $('#btn_fetch').addClass("btn btn-outline-success");
                $('#btn_fetch').text("Fetched");
                if(status=="link_det"){
                    alert("da");
                }
                activate_search();
            }
    
        });

    })

    
        $("#ip").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#data_container tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });




});

function activate_search(){

    $('#ip').removeAttr("disabled");
    $('#btn_search').removeAttr("disabled");
    $('#ip').addClass("border border-white text-info");
    $('#btn_search').removeClass("btn btn-sm btn-outline-secondary");
    $('#btn_search').addClass("btn btn-sm btn-outline-primary");
}