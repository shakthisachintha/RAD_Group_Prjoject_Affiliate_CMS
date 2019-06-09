<div class="bg-dark border-right" id="sidebar-wrapper">
	<div class="text-success sidebar-heading">Admin Panel </div>
	<div class="list-group list-group-flush">
		<a href="/admin/profile" class="list-group-item text-primary list-group-item-action bg-dark">Profile</a>
		<a href="/admin/links" class="list-group-item text-primary list-group-item-action bg-dark">Link Clicks</a>
		<a href="/admin/linkgen" class="list-group-item text-primary list-group-item-action bg-dark">Generate Link</a>
		<a href="/admin/contacts" class="list-group-item text-primary list-group-item-action bg-dark">Contact Messages</a>
		<a href="#" class="list-group-item text-primary list-group-item-action bg-black">Pageviews</a>
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


<div id="page-content-wrapper">

	<nav class="navbar navbar-dark bg-dark">

		<button class="navbar-toggler" id="menu-toggle"><span id="menu-toggle" class="navbar-toggler-icon"></span></button>


		<h4 class="align-bottom text-success mx-auto">E-Money Dream Admin Panel</h4>

	</nav>

	<div id="main_content" class="container-fluid">
		<h1 class="display-4 text-secondary">Pageviews</h1>

		<!-- content goes here -->

		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
			google.charts.load('current', {
				'packages': ['corechart']
			});
			google.charts.setOnLoadCallback(drawMonthChart);

			function drawMonthChart() {
				var data = google.visualization.arrayToDataTable([
					['Month', 'Views'],
					<?php foreach ($monthly->result() as $row) : ?>['<?= $row->month ?>', <?= $row->views ?>],
					<?php endforeach; ?>
				]);

				var options = {

					title: 'Pageviews Month Vise',
					curveType: 'function',
					legend: {

					},
					hAxis: {
						title: 'Month'
					},
					vAxis: {
						title: 'Views'
					}
				};

				var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

				chart.draw(data, options);
			}

			// Country Wise

			google.charts.load('current', {
				'packages': ['corechart']
			});
			google.charts.setOnLoadCallback(drawCountryChart);

			function drawCountryChart() {

				var data = google.visualization.arrayToDataTable([
					['Country', 'Views'],
					<?php foreach ($country->result() as $data) : ?>['<?= $data->country ?>', <?= $data->views ?>],
					<?php endforeach; ?>

				]);

				var options = {
					title: 'Pageviews Country Domination',
					// is3D: true,
					pieHole: 0.4,
				};

				var chart = new google.visualization.PieChart(document.getElementById('piechart'));

				chart.draw(data, options);
			}

			// City Wise
			google.charts.load('current', {
				'packages': ['corechart']
			});
			google.charts.setOnLoadCallback(drawCityChart);

			function drawCityChart() {

				var data = google.visualization.arrayToDataTable([
					['Country', 'Views'],
					<?php foreach ($city->result() as $data) : ?>['<?= $data->city ?>', <?= $data->views ?>],
					<?php endforeach; ?>

				]);

				var options = {
					title: 'Pageviews By City',
					// is3D: true,
					pieHole: 0.4,
				};

				var chart = new google.visualization.PieChart(document.getElementById('piechart_city'));

				chart.draw(data, options);
			}
		</script>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h4 class="text-primary text-center">Monthly Pageviews</h4>
					<div id="curve_chart"></div>
				</div>
			</div>

			<div class="mt-5 row">
				<div class="col-md-6">
					<h4 class="text-primary text-center">Page Views By Country</h4>
					<div style="height:400px ;width:auto;padding:0;margin:0" class="img-fluid" id="piechart"></div>
				</div>

				<div class="col-md-6">
					<h4 class="text-primary text-center">Page Views By City</h4>
					<div style="height:400px ;width:auto;padding:0;margin:0" class="img-fluid" id="piechart_city"></div>
				</div>
			</div>

			<div class="row mt-5">
				<div class="col-md-12">
					<h4 class="text-primary text-center">Post Overview</h4>
					<div class="table-dark text-warning table-hover table-responsive-md">
						<table class="table">
							<thead class="thead-dark">
								<tr>
									<th>#</th>
									<th>Title</th>
									<th>Author</th>
									<th>Language</th>
									<th>Views</th>
									<th>Published</th>
								</tr>
							</thead>
							<tbody>
								<?php $count = 0 ?>
								<?php foreach ($post->result() as $result) : ?>
									<?php $count++ ?>
									<tr>
										<td><?= $count ?></td>
										<td><?= $result->title ?></td>
										<td><?= $result->author ?></td>
										<td><?= $result->lang ?></td>
										<td><?= $result->views ?></td>
										<td>
											<form>
												<div class="custom-control custom-switch">
													<input <?php if($result->published=="yes"){echo "checked";} ?> type="checkbox" class="custom-control-input" id="switch<?= $result->id ?>">
													<label class="custom-control-label" for="switch<?= $result->id ?>"><?php if($result->published=="yes"){echo "Yes";}else{echo "No";} ?></label>
												</div>
											</form>
										</td>
									</tr>
								<?php endforeach; ?>

							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- /#page-content-wrapper -->






<script>
	// Add the following code if you want the name of the file appear on select
	$(".custom-file-input").on("change", function() {
		var fileName = $(this).val().split("\\").pop();
		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});
</script>