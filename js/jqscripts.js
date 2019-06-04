


$(document).ready(function () {
    // JS Function for delay
    function revoke() {
        $("#btn-submit").removeClass("btn-success");
        $("#btn-submit").addClass("btn-primary");
        $("#btn-submit").removeClass("disabled");
        $('#my-form').trigger("reset");
        $("#btn-submit").val("Send Message");
        $("#head").removeClass("text-primary font-weight-bold");
        $("#head").text("Drop Us a Message");
    } // 0Does nothing.


    function wait() {
        $("#btn-submit").removeClass("btn-danger");
        $("#btn-submit").val("Send Message");

        $("#Name").removeClass("border border-danger");
        $("#Email").removeClass("border border-danger");
        $("#Phone").removeClass("border border-danger");
        $("#Msg").removeClass("border border-danger");
    }

    $("#btn-submit").click(function () {

        var name = $("#Name").val();
        var email = $("#Email").val();
        var phone = $("#Phone").val();
        var msg = $("#Msg").val();
        if (name && email && phone && msg) {
            $.ajax({
                method: "POST",
                url: "../php/contact.php",
                data: { Name: name, Email: email, Phone: phone, Msg: msg },
                success: function (status) {
                    suc();
                    $("#btn-submit").removeClass("btn-primary");
                    $("#btn-submit").addClass("btn-success");
                    $("#btn-submit").val(status);
                    $("#Name").addClass("border-success");
                    $("#Email").addClass("border-success");
                    $("#Phone").addClass("border-success");
                    $("#Msg").addClass("border-success");
                    $("#btn-submit").prop('disabled', true);



                }

            })
        } else {
            $("#btn-submit").addClass("btn-danger");
            $("#btn-submit").val("Fill All Fields");

            $("#Name").addClass("border border-danger");
            $("#Email").addClass("border border-danger");
            $("#Phone").addClass("border border-danger");
            $("#Msg").addClass("border border-danger");
            setTimeout(wait, 3000);
        }

    });
});


function suc() {
    Swal.fire(
        'Thank You!',
        'Your Feedback Has Been Sent',
        'success'
    )
}