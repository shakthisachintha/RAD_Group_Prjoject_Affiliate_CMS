<div class="bg-dark border-right" id="sidebar-wrapper">
	<div class="text-success sidebar-heading">Admin Panel </div>
	<div class="list-group list-group-flush">
		<a href="/admin/profile" class="list-group-item text-primary list-group-item-action bg-dark">Profile</a>
		<a href="/admin/links" class="list-group-item text-primary list-group-item-action bg-dark">Link Clicks</a>
		<a href="#" class="list-group-item text-primary list-group-item-action bg-black">Generate Link</a>
		<a href="/admin/contacts" class="list-group-item text-primary list-group-item-action bg-dark">Contact Messages</a>
		<a href="/admin/pageviews" class="list-group-item text-primary list-group-item-action bg-dark">Pageviews</a>
		<a href="/admin/ebates" class="list-group-item text-primary list-group-item-action bg-dark">Ebates Form</a>
		<a href="/admin/fiver" class="list-group-item text-primary list-group-item-action bg-dark">Fiverr Form</a>
		<a href="/admin/newpost" class="list-group-item text-primary list-group-item-action bg-dark">New Post</a>
		<a href="/admin/mailnew" class="list-group-item text-primary list-group-item-action bg-dark">Send Mails</a>
		<a href="/admin/mailoutbox" class="list-group-item text-primary list-group-item-action bg-dark">View Mails</a>
		
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
		<h1 class="display-4 text-secondary">Generate Link</h1>

		<!-- content goes here -->
		<div class="row">
			<div class="col">
				<h1 class="display-5 text-center text-primary">Generate Trackable Link</h1>
				<form id="link_gen" method="post" class="border text-primary border-primary p-4 m-3 rounded" action="/linkdata/linkGen">
					<div class="form-group">
						<label for="url">Link URL</label>
						<input name="url" id="url" required class="form-control" type="text">
					</div>


					<div class="form-group">
						<label for="linkname">Link Name</label>
						<input name="linkname" required id="linkname" class="form-control" type="text">
					</div>

					<div class="form-group">
						<label for="desc">Description</label>
						<textarea name="desc" id="desc" class="form-control" rows="3"></textarea>
					</div>

					<div class="form-group form-check form-check-inline">
						<input id="generate" value="Generate" class="btn btn-outline-primary form-control form-check-input" type="submit">
						<input id="cancel" value="Cancel" class="btn btn-outline-secondary form-control form-check-input" type="reset">
					</div>

					<div class="form-group">
						<label for="link">Embed This In HTML Document</label>
						<input readonly id="link" class="form-control" type="text">
					</div>

					<div class="form-group">
						<label for="linkid">Link ID</label>
						<input readonly id="linkid" class="form-control" type="text">
					</div>

				</form>


			</div>
		</div>
		<h1 class="display-5 text-center text-primary">All Link Details</h1>
		<div class="mt-4" id="data_table">

			<div class="p-3 m-3 border border-primary rounded text-warning table-hover table-responsive-md">
				<table class="table">
					<thead class="thead-light">
						<tr>
							<th>#</th>
							<th>URL</th>
							<th>Name</th>
							<th>Desc</th>
							<th>Embed</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody id="data_container">
						<?php $count = 0 ?>
						<?php foreach ($query->result() as $result) : ?>
							<?php $count++ ?>
							<tr>
								<td>
									<form action="/linkdata/linkUpdate/<?= $result->id ?>" method="post"><?= $count; ?>
								</td>
								<td><input name="url" class="form-control" value="<?= $result->url; ?>"></td>
								<td><input name="linkname" class="form-control" value="<?= $result->name; ?>"></td>
								<td><input name="desc" class="form-control" value="<?= $result->description; ?>"></td>
								<td><input onclick="copy(this.id)" id="link<?= $result->id ?>" readonly class="form-control" value="<a id='<?= $result->id ?>' onclick='redirect(this.id)' href='#'> Click Here </a>"></td>
								<td><input type="submit" value="Update" class="btn btn-sm btn-warning"></form>
								</td>
								<td>
									<form action="/linkdata/linkDel/<?= $result->id ?>" method="post"><input type="submit" value="Delete" class="btn btn-sm btn-danger"></form>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>


	</div>
</div>

<script>
	function copy(id) {
		var copyText = document.getElementById(id);
		copyText.select();
		document.execCommand("copy");
		alert("Link Tag Coppied To Clipboard");
	}

	$(document).ready(function() {

		$("#link_gen").submit(function(e) {

			var form = $(this);
			var url = form.attr('action');

			$.ajax({
				type: "POST",
				url: url,
				data: form.serialize(), // serializes the form's elements.
				success: function(data) {
					var obj = JSON.parse(data);
					$('#linkid').val(obj.id);
					$('#link').val(obj.link);
					$("#generate").attr('disabled', 'disabled');
					$("#cancel").attr('disabled', 'disabled');

				}
			});

			e.preventDefault(); // avoid to execute the actual submit of the form.
		});



	});
</script>
<!-- /#page-content-wrapper -->