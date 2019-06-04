
var ref;
$(document).ready(function () {
    $('#ez').change(function () {
        $('#pay_details').removeAttr('disabled');
        $('#lbl').text("Ez-Cash Number");
    });

    $('#skrill').change(function () {
        $('#pay_details').removeAttr('disabled');
        $('#lbl').text("Skrill Email");
    });

    $('#paypal').change(function () {
        $('#pay_details').removeAttr('disabled');
        $('#lbl').text("Paypal Email");
    });

    $('#pay_details').click(function () {
        $('#btn-submit').removeClass("btn-danger");
        $('#btn-submit').addClass("btn-primary");
        $("#main").removeClass("border-danger");
        $("#main").addClass("border-primary");
        $('#btn-submit').text("Submit");
    });

    $("#btn-submit").click(function () {

    
    var name = $("#name").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var pay = $("input[name='pay']:checked").val();
    var pay_det=$('#pay_details').val();

    if (name && email && phone && pay && pay_det) {
        $.ajax({
            method: "POST",
            url: "../../php/data.php",
            data: { Name: name, Email: email, Phone: phone, Pay: pay, Pay_Det: pay_det },
            success: function (status) {
                ref=status;
                $('#stat').text("Submittion Success. Reference : "+status);
                $("#btn-submit").addClass("btn-success");
                $("#btn-submit").text("Success");
                $("#name").addClass("border-success");
                $("#email").addClass("border-success");
                $("#phone").addClass("border-success");
                $("#pay_details").addClass("border-success"); 
                $("#main").addClass("border-success");
                $("#btn-submit").prop('disabled', true);
                suc();
            }

        })
    } else {
        $("#btn-submit").addClass("btn-danger");
        $("#btn-submit").text("Fill All Fields");
        $("#name").addClass("border-danger");
        $("#email").addClass("border-danger");
        $("#phone").addClass("border-danger");
        $("#pay_details").addClass("border-danger"); 
        $("#main").addClass("border-danger");  z
    }




    });
});

function suc(){
    Swal.fire(
'Thank You!',
'Your Details Have Been Submited.'+'<br>'+'Your Reference : '+ref,
'success'
)
}
