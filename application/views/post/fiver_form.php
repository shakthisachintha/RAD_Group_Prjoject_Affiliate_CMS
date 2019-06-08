<div class="row sticky-top">
    <div class="col">
        <!-- Navigation Pane -->
        <nav class="navbar navbar-expand-md navbar-dark elegant-color-dark shadow-lg mb-4">
            <a class="navbar-brand" href="/index.php"><img src="/Images/favicon.png" style="width:20px;" alt="E-Money Dream">&nbsp;E-Money
                Dream</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/postcontent/view/<?= $lang ?>/<?= $id ?>">Fiverr Reviews</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#top">Registration Form</a>
                    </li>

                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <div style="display: inline-flex;">
                            <a class="nav-link" target="new" href="https://www.facebook.com/EmoneyDream"><i class='fab fa-facebook-square' style='font-size:24px'></i></a>&nbsp;&nbsp;
                            <a class="nav-link" target="new" href="https://www.google.com"><i class='fab fa-google-plus-square' style='font-size:24px'></i></a>&nbsp;&nbsp;
                            <a class="nav-link" target="new" href="https://www.youtube.com/channel/UC7_87Azo57GFGBiWIkr7TvA"><i class='fab fa-youtube-square' style='font-size:24px'></i></a>&nbsp;&nbsp;
                            <a class="nav-link" target="new" href="https://blog.emoneydream.com"><i class='fab fa-blogger' style='font-size:24px'></i></a>
                        </div>

                    </li>
                </ul>

            </div>
        </nav>

    </div>
</div>


<div class="row yes-margin">
    <div class="mx-auto col-sm-7">
        <h3 align="center" class="mx-auto text-primary display-4">Registration Form</h3><br>
        <div class="container-fluid text-dark font-weight-bold lead" align="center">
            <p>
                If You Followed Our Referal Link And Created a New Account.Fill This Form To Receive Your Free Review and Get Your Money Back.
            </p>

        </div>
    </div>
</div>

<br>



<div class="row">
    <div id="main" class="mx-auto border border-primary rounded col-sm-7">
        <div class="container-fluid">
            <br>
            <form>
                <div class="form-group">
                    <label for="emailc">Email Address:</label>
                    <input placeholder="Your Email Address" type="email" class="form-control" id="emailc">
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input placeholder="Your Name" type="text" class="form-control" id="name">
                </div>

                <div class="form-group">
                    <label for="phone">Mobile Number</label>
                    <input placeholder="07X-XXXXXXX" type="text" class="form-control" id="phone">
                </div>

                <div class="form-group">
                    <label for="phone">Registered Date On Fiverr</label>
                    <input type="date" value="YYYY-MM-DD" class="form-control" id="date">
                </div>

                <div class="form-group">
                    <label for="phone">Gig ID Which You Bought</label>
                    <select class="form-control" id="gigid">
                        <option value="GIG01">GIG01</option>
                        <option value="GIG02">GIG02</option>
                        <!-- <option value="GIG03">GIG03</option> -->
                    </select>
                </div>

                <div class="form-group">
                    <label for="phone">Link To Your Fiverr Profile</label>
                    <input type="text" class="form-control" id="prof_link">
                </div>


                <div class="form-group">
                    <label for="phone">Link To The Gig</label>
                    <input type="text" placeholder="Review Will Be Add To This Gig" class="form-control" id="gig_link">
                </div>

                <label for="paymnet">Payment Method</label>
                <div class="form-group" id="paymnet">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" id="ez" value="ez-cash" class="form-check-input" name="pay">Ez-Cash
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" id="paypal" value="paypal" class="form-check-input" name="pay">Paypal
                        </label>
                    </div>
                    <div class="form-check-inline disabled">
                        <label class="form-check-label">
                            <input type="radio" id="skrill" value="skrill" class="form-check-input" name="pay">Skrill
                        </label>
                    </div>
                </div>

                <div class="form-group disabled">
                    <label id="lbl" for="pay_details">Payment Details</label>
                    <input type="text" class="form-control" disabled id="pay_details">
                </div>

                <div class="form-group-inline">
                    <button id="btn-submit" type="button" class="btn rounded btn-primary">Submit</button>
                    &nbsp; <span class="text-success" id="stat"></span>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>

<br><br>

<script>
    var ref;
    $(document).ready(function() {
        $('#ez').change(function() {
            $('#pay_details').removeAttr('disabled');
            $('#lbl').text("Ez-Cash Number");
        });

        $('#skrill').change(function() {
            $('#pay_details').removeAttr('disabled');
            $('#lbl').text("Skrill Email");
        });

        $('#paypal').change(function() {
            $('#pay_details').removeAttr('disabled');
            $('#lbl').text("Paypal Email");
        });

        $('#pay_details').click(function() {
            $('#btn-submit').removeClass("btn-danger");
            $('#btn-submit').addClass("btn-primary");
            $("#main").removeClass("border-danger");
            $("#main").addClass("border-primary");
            $('#btn-submit').text("Submit");
        });

        $("#btn-submit").click(function() {


            var name = $("#name").val();
            var email = $("#emailc").val();
            var phone = $("#phone").val();
            var pay = $("input[name='pay']:checked").val();
            var pay_det = $('#pay_details').val();
            var gigid = $('#gigid').val();
            var prof_link = $('#prof_link').val();
            var date = $('#date').val();
            var gig_link = $('#gig_link').val();

            if (name && email && phone && pay && pay_det && gigid && prof_link && date && gig_link) {
                $.ajax({
                    method: "POST",
                    url: "/customer/fiverForm",
                    data: {
                        Name: name,
                        Email: email,
                        Phone: phone,
                        Pay: pay,
                        Pay_Det: pay_det,
                        Gigid: gigid,
                        Prof_link: prof_link,
                        Date: date,
                        Gig_link: gig_link
                    },
                    success: function(status) {
                        ref = status;
                        $('#stat').text("Submittion Success. Reference : " + status);
                        $("#btn-submit").addClass("btn-success");
                        $("#btn-submit").text("Success");
                        $("#name").addClass("border-success");
                        $("#email").addClass("border-success");
                        $("#phone").addClass("border-success");
                        $("#pay_details").addClass("border-success");
                        $("#main").addClass("border-success");

                        $("#gigid").addClass("border-success");
                        $("#date").addClass("border-success");
                        $("#prof_link").addClass("border-success");
                        $("#gig_link").addClass("border-success");

                        $("#btn-submit").prop('disabled', true);
                        suce();
                    }

                })
            } else {
                $("#btn-submit").addClass("btn-danger");
                $("#btn-submit").text("Fill All Fields");
                $("#name").addClass("border-danger");
                $("#email").addClass("border-danger");
                $("#phone").addClass("border-danger");
                $("#pay_details").addClass("border-danger");
                $("#main").addClass("border-danger");
                $("#gigid").addClass("border-danger");
                $("#date").addClass("border-danger");
                $("#prof_link").addClass("border-danger");
                $("#gig_link").addClass("border-danger");
            }




        });
    });

    function suce() {
        Swal.fire({
            background: '#000',
            type: 'success',
            title: '<span class="text-success">Thank You!</span>',
            html: '<span class="text-info">Your Details Have Been Submited.<br>Your Reference : ' + ref + '</span>'
        })
    }
</script>