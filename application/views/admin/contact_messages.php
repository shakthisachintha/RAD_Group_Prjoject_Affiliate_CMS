<div class="bg-dark border-right" id="sidebar-wrapper">
	<div class="text-success sidebar-heading">Admin Panel </div>
	<div class="list-group list-group-flush">
		<a href="/admin/profile" class="list-group-item text-primary list-group-item-action bg-dark">Profile</a>
		<a href="/admin/links" class="list-group-item text-primary list-group-item-action bg-dark">Link Clicks</a>
		<a href="/admin/linkgen" class="list-group-item text-primary list-group-item-action bg-dark">Generate Link</a>
		<a href="#" class="list-group-item text-primary list-group-item-action bg-black">Contact Messages</a>
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


<div id="page-content-wrapper">

	<nav class="navbar navbar-dark bg-dark">

		<button class="navbar-toggler" id="menu-toggle"><span id="menu-toggle" class="navbar-toggler-icon"></span></button>


		<h4 class="align-bottom text-success mx-auto">E-Money Dream Admin Panel</h4>

	</nav>

	<div id="main_content" class="container-fluid">
		<h1 class="display-4 text-secondary">Contact Messages</h1><br>
		<table>
			<tr>
				<td><a class="text-decoration-none btn btn-primary" href="#dailyMessageReports">Daily Message Reports</a> </td>
				<td><a class="text-decoration-none btn btn-primary" href="#monthlyMessageReports">Monthly Message Reports</a> </td>
				<td><a class="text-decoration-none btn btn-primary" href="#yearlyMessageReports">Yearly Message Reports</a> </td>
			</tr>
		</table>
		<!-- content goes here -->

		<div class="mt-4" id="data_table">

			<div class="table-dark text-warning table-hover table-responsive-md">
				<table class="table">
					<thead class="thead-light">



						<tr>
							<th>#</th>
							<th>Date</th>
							<th>From Email</th>
							<th>Name</th>
							<th>Phone</th>
							<th>Message</th>
							<th></th>
						</tr>
					</thead>

					<tbody id="data_container">
						<?php $count = 0 ?>
						<?php foreach ($query1->result() as $result) : ?>
							<?php $count++ ?>
							<tr>
								<td><?= $count; ?></td>
								<td><?= $result->timestamp; ?></td>
								<td><?= $result->from_email; ?></td>
								<td><?= $result->name; ?></td>
								<td><?= $result->phone; ?></td>
								<td><?= $result->message; ?></td>
								<td>
									<form action="/admin/loadReports/<?= $result->id ?>" method="post"><input type="submit" value="Delete" class="btn btn-sm btn-warning"></form>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>

				</table>
				<td><a class="text-decoration-none btn btn-primary" href="#">Go to Messages</a></td>




				<p id="dailyMessageReports">
					<h1 class="display-4 text-secondary">Daily Message Reports</h1><br>
					<table class="table">
						<thead class="thead-light">



							<tr>

								<th>Date</th>
								<th>Message Count</th>

								<th></th>
							</tr>
						</thead>

						<tbody id="data_container">

							<?php foreach ($query2->result() as $result) : ?>

								<tr>

									<td><?= $result->timestamp; ?></td>
									<td><?= $result->count; ?></td>

								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>

					<html>

					<head>



					</html>
					<td><a href="#" class="text-decoration-none btn btn-primary">Go to Messages</a></td>

					<p id="monthlyMessageReports">
						<h1 class="display-4 text-secondary">Monthly Messages Report</h1><br>
						<table class="table">
							<thead class="thead-light">



								<tr>
									<th>Month</th>
									<th>Message Count</th>

									<th></th>
								</tr>
							</thead>

							<tbody id="data_container">

								<?php foreach ($query3->result() as $result) : ?>

									<tr>
										<td>20<?= $result->timestamp; ?></td>
										<td><?= $result->count; ?></td>

									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>

						<td><a class="text-decoration-none btn btn-primary" href="#">Go to Messages</a></td>
						<p id="yearlyMessageReports">
							<h1 class="display-4 text-secondary">Yearly Messages Report</h1><br>
							<table class="table">
								<thead class="thead-light">
									<tr>
										<th>Year</th>
										<th>Message Count</th>
										<th></th>
									</tr>
								</thead>

								<tbody id="data_container">

									<?php foreach ($query4->result() as $result) : ?>
										<?php $count++ ?>
										<tr>

											<td>20<?= $result->timestamp; ?></td>
											<td><?= $result->count; ?></td>
											<td></td>
										</tr>
									<?php endforeach; ?>

								</tbody>
								<td><a href="#" class="text-decoration-none btn btn-primary">Go to Messages</a></td>
							</table>


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