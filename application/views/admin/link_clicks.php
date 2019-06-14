<!-- Sidebar -->

<script>
	var link_id;

	function select_func(val) {
		link_id = val;
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

		$("#menu-toggle").click(function (e) {

			$("#wrapper").toggleClass("toggled");
		});

		$('#_loader').hide();

		$("#menu-toggle").click(function (e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});

		$("#btn_fetch").click(function (e) {
			e.preventDefault();
			$("#btn_fetch").text("");
			$("#btn_fetch").append(
				"<div id='loader' class='spinner-grow spinner-grow-sm'></div> Fetching..");



			$.ajax({
				method: "POST",
				url: "/linkdata/linkDetails/" + link_id,
				success: function (status) {

					var obj = JSON.parse(status);
					$('#link_name').text(obj.name);
					$('#link_url').text(obj.url);
					$('#link_id').text(obj.id);
				}

			});


			$.ajax({
				method: "POST",
				url: "/linkdata/linkRecords/" + link_id,
				success: function (status) {
					$('#data_table').removeClass("invisible");
					$('#data_container').html(status);
					$('#btn_fetch').addClass("btn btn-outline-success");
					$('#btn_fetch').text("Fetched");
					if (status == "link_det") {

					}
					activate_search();
				}

			});

		})


		$("#ip").on("keyup", function () {
			var value = $(this).val().toLowerCase();
			$("#data_container tr").filter(function () {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});

	});

	function activate_search() {

		$('#ip').removeAttr("disabled");
		$('#btn_search').removeAttr("disabled");
		$('#ip').addClass("border border-white text-info");
		$('#btn_search').removeClass("btn btn-sm btn-outline-secondary");
		$('#btn_search').addClass("btn btn-sm btn-outline-primary");
	}

	function loader(name) {


		$("#main_content").fadeOut(500);

		$("#nav1").removeClass("bg-black");
		$("#nav2").removeClass("bg-black");
		$("#nav3").removeClass("bg-black");
		$("#nav4").removeClass("bg-black");
		$("#nav5").removeClass("bg-black");
		$("#nav6").removeClass("bg-black");

		$("#nav1").addClass("bg-dark");
		$("#nav2").addClass("bg-dark");
		$("#nav3").addClass("bg-dark");
		$("#nav4").addClass("bg-dark");
		$("#nav5").addClass("bg-dark");
		$("#nav6").addClass("bg-dark");



		if (name == "newpost") {
			setTimeout(function () {
				$("#main_content").css("display", "none");
				$("#main_content").fadeIn(500);
				$("#main_content").load("newpost.html");
				$("#nav6").addClass("bg-black");

			}, 500);
		} else if (name == "linktrack") {
			setTimeout(function () {
				$("#main_content").css("display", "none");
				$("#main_content").fadeIn(500);
				$("#main_content").load("index.html #main_content");
				$("#nav6").addClass("bg-black");

			}, 500);
		}
	}

</script>

<div class="bg-dark border-right" id="sidebar-wrapper">
	<div class="text-success sidebar-heading">Admin Panel </div>
	<div class="list-group list-group-flush">
	<a href="/admin/profile" class="list-group-item text-primary list-group-item-action bg-dark">Profile</a>
		<a href="#" class="list-group-item text-primary list-group-item-action bg-black">Link Clicks</a>
		<a href="/admin/linkgen" class="list-group-item text-primary list-group-item-action bg-dark">Generate Link</a>
		<a href="/admin/contacts" class="list-group-item text-primary list-group-item-action bg-dark">Contact
			Messages</a>
		<a href="/admin/pageviews" class="list-group-item text-primary list-group-item-action bg-dark">Pageviews</a>
		<a href="/admin/ebates" class="list-group-item text-primary list-group-item-action bg-dark">Ebates Form</a>
		<a href="/admin/fiver" class="list-group-item text-primary list-group-item-action bg-dark">Fiverr Form</a>
		<a href="/admin/newpost" class="list-group-item text-primary list-group-item-action bg-dark">New Post</a>
		<a href="/admin/mailnew" class="list-group-item text-primary list-group-item-action bg-dark">Send Mails</a>
		<a href="/admin/mailoutbox" class="list-group-item text-primary list-group-item-action bg-dark">View Mails</a>
		<a href="/admin/maildraft" class="list-group-item text-primary list-group-item-action bg-dark">Draft Mails</a>
		<a href="/user/logout" class="list-group-item text-warning bg-dark">Logout</a>
	</div>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">

	<nav class="navbar navbar-dark bg-dark">

		<button class="navbar-toggler" id="menu-toggle"><span id="menu-toggle"
				class="navbar-toggler-icon"></span></button>

		<!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->
		<h4 class="align-bottom text-success mx-auto">E-Money Dream Admin Panel</h4>

	</nav>

	<div id="main_content" class="container-fluid">
		<h1 class="display-4 text-secondary">Link Clicks</h1>
		<div class="form-inline">
			<select onchange="select_func(this.value)" name="link"
				class="form-control text-info form-check-inline bg-black border border-white" id="link_select">
				<option class="text-muted" value="na">Select Link</option>
				<?php foreach($query->result() as $row): ?>
				<option class="text-info" value="<?=$row->id?>"><?=$row->name?></option>
				<?php endforeach; ?>
			</select>
			<button id="btn_fetch" disabled class="btn btn-outline-primary">Fetch</button>
		</div>
		<p></p>
		<div class="form-check-inline">
			<input id="ip" type="text" disabled placeholder=" Type To Search"
				class="text-info bg-black border border-secondary form-control form-control-md form-check-inline">
		</div>

		<br><br>

		<!-- Data Table -->
		<div class="invisible" id="data_table">
			<div class="lead text-light">Link Name : <span class="text-success" id="link_name"></span>&nbsp;&nbsp; ID :
				<span id="link_id" class="text-success"></span>&nbsp;&nbsp; URL : <span class="text-info"
					id="link_url"></span>
			</div>
			<div class="table-dark text-warning table-hover table-responsive-md">
				<table class="table">
					<thead class="thead-light">
						<tr>
							<th>#</th>
							<th>Date</th>
							<th>IP</th>
							<th>ISP</th>
							<th>Country</th>
							<th>City</th>
                            <th>Province</th>
                            <th></th>
						</tr>
					</thead>
					<tbody id="data_container">
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /#page-content-wrapper -->

</div>
