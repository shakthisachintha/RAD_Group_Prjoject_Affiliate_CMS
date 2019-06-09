<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-43198856-2"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-43198856-2');

	</script>

	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
		(adsbygoogle = window.adsbygoogle || []).push({
			google_ad_client: "ca-pub-8462952320096109",
			enable_page_level_ads: true
		});

	</script>

	<!--Meta Data-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="Welcome To E Money Dream. We Provide You Best Online Money Earning Methods/Solutions.
Free IQ Option / Binary Option Trading Signals, Trading Insurance Online Money Earning Methods, Micro Jobs, Work From Home Jobs Etc.
All Methods Are In Sinhala And English." />
	<meta name="keywords"
		content="online,income,opportunities,earn,money,sinhala,make,fast,how to,free,e money,sites,english,ebates,binary,trading,signal,signals,forex,iq option,offer">
	<link rel="canonical" href="https://www.emoneydream.com" />

	<!-- Site Details -->
	<title>E-Money Dream Online Earning Solutions</title>
	<!--Favicon-->
	<link rel="shortcut icon" type="image/png" href="/Images/favicon.png" />

	<!-- Stylesheet -->
	<link rel="stylesheet" href="/CSS/style.css">

	<!--Bootstrap-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
		integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
		integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
		integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
	</script>

	<!-- Font Awesome ICONS -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
		integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Analytic Js -->
	<script src="js/anal.js"></script>

</head>

<body>

	<script>
		function showPass() {
			var x = document.getElementById("reg_password");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}

	</script>

	<script>
		
		$(document).ready(function () {

			$.getJSON('https://api.ipdata.co/?api-key=dbc225ea3dbabbca241a7c1b895b06fbaa4e0af47fa062b144c6b649',
				function (data) {
                    var ip, country, countrycode, city, province;
					ip = data.ip;
					country = data.country_name;
					countrycode = data.country_code;
					city = data.city;
                    province = data.region;
                    paegView(ip,country,city,province,countrycode)
				});

			$("#log_form").submit(function (e) {
				var form = $(this);
				var url = form.attr('action');

				$.ajax({
					type: "POST",
					url: url,
					data: form.serialize(), // serializes the form's elements.
					success: function (data) {
						if (data == "SUCCESS") {
							location.reload();
							$("#login_stat").text("Redirecting...");
						} else {
							$("#login_stat").removeClass('text-primary');
							$("#login_stat").addClass('text-danger');
							$("#login_stat").text(data);
						}

					}
				});
				e.preventDefault(); // avoid to execute the actual submit of the form.
			});



			$("#reg_form").submit(function (e) {
				var form = $(this);
				var url = form.attr('action');

				$.ajax({
					type: "POST",
					url: url,
					data: form.serialize(), // serializes the form's elements.
					success: function (data) {
						if (data == "SUCCESS") {
							$("#reg_stat").removeClass('text-danger');
							$("#reg_stat").addClass('text-primary');
							$("#reg_stat").text("Registration Success!");
							$("#reg_btn").attr('disabled', 'disabled');
							$("#reg_email").attr('disabled', 'disabled');
							$("#reg_name").attr('disabled', 'disabled');
							$("#reg_password").attr('disabled', 'disabled');
						} else {
							$("#reg_stat").removeClass('text-primary');
							$("#reg_stat").addClass('text-danger');
							$("#reg_stat").text(data);
						}

					}
				});
				e.preventDefault(); // avoid to execute the actual submit of the form.
			});

		});

		function paegView(ip,country,city,province,countrycode) {
			$.ajax({
				method: "POST",
				url: "/Analytics/pageViews",
				data: {
					IP: ip,
					Country: country,
					City: city,
					Province: province,
					CountryCode: countrycode
				},
				success: function (data) {
                    console.log(data);
				}
			});
		}

	</script>

	<!-- SweetAlertJS -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

	<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

	<div id="top" class="row">
		<div class="col">
			<div class="no-margin jumbotron jumbotron-fluid">
				<div class="container">
					<h1>E-Money Dream</h1>
					<p>Welcome to E-Money Dream. We Provide You Free Binary Trading Signals,Trading Insurance,Online
						Money Earning Tips/Tricks.
						We Are a Group of People with Vast Experience Over Trading And E-Money.</p>
				</div>
			</div>
		</div>
	</div>

	<!-- Modals -->

	<!-- Login Modal -->
	<div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="login_modalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content bg-light">
				<div class="modal-header">
					<h5 class="modal-title" id="loginModalLabel">Login</h5>
				</div>
				<div class="modal-body">
					<form action="/user/login" method="post" id="log_form">
						<div class="form-group">
							<label for="email">Email</label>
							<input id="login_email" class="form-control bg-light border-dark lead" type="email" required
								name="email">
						</div>

						<div class="form-group">
							<label for="password">Password</label>
							<input id="login_password" class="form-control bg-light border-dark lead" type="password"
								required name="password">
						</div>

						<div>
							<p class="lead text-primary text-center" id="login_stat"></p>
						</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Login</button>
					<button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Reg Modal -->
	<div class="modal fade" id="reg_modal" tabindex="-1" role="dialog" aria-labelledby="reg_modalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content bg-light">
				<div class="modal-header">
					<h5 class="modal-title" id="regModalLabel">Register</h5>
				</div>
				<div class="modal-body">
					<form action="/user/reg" method="post" id="reg_form">

						<div class="form-group">
							<label for="reg_name">Name</label>
							<input id="reg_name" class="form-control bg-light border-dark lead" type="text" name="name">
						</div>

						<div class="form-group">
							<label for="reg_email">Email</label>
							<input id="reg_email" class="form-control bg-light border-dark lead" type="email" required
								name="email">
						</div>

						<div class="form-group">
							<label for="reg_password">Password</label>
							<input id="reg_password" class="form-control bg-light border-dark lead" type="password"
								required name="password">

							<div class="mt-1 custom-control custom-checkbox">
								<input type="checkbox" onchange="showPass()" class="custom-control-input"
									id="show_pass">
								<label class="custom-control-label" for="show_pass">Show Password</label>
							</div>

						</div>

						<div>
							<p class="lead text-primary text-center" id="reg_stat"></p>
						</div>

				</div>
				<div class="modal-footer">
					<button type="submit" id="reg_btn" class="btn btn-primary">Register</button>
					<button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>
				</form>
			</div>
		</div>
	</div>



	<!-- /Modals -->
