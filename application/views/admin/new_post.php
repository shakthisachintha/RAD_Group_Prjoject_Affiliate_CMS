<div class="bg-dark border-right" id="sidebar-wrapper">
	<div class="text-success sidebar-heading">Admin Panel </div>
	<div class="list-group list-group-flush">
		<a href="links" class="list-group-item text-primary list-group-item-action bg-dark">Link Clicks</a>
		<a href="contacts" class="list-group-item text-primary list-group-item-action bg-dark">Contact Messages</a>
		<a href="pageviews" class="list-group-item text-primary list-group-item-action bg-dark">Pageviews</a>
		<a href="ebates" class="list-group-item text-primary list-group-item-action bg-dark">Ebates Form</a>
		<a href="profile" class="list-group-item text-primary list-group-item-action bg-dark">Profile</a>
		<a href="#" class="list-group-item text-primary list-group-item-action bg-black">New Post</a>
		<a href="mailnew" class="list-group-item text-primary list-group-item-action bg-dark">Send Mails</a>
		<a href="mailoutbox" class="list-group-item text-primary list-group-item-action bg-dark">View Mails</a>
		<a href="maildraft" class="list-group-item text-primary list-group-item-action bg-dark">Draft Mails</a>
	</div>
</div>
<!-- /#sidebar-wrapper -->


<div id="page-content-wrapper">

	<nav class="navbar navbar-dark bg-dark">

		<button class="navbar-toggler" id="menu-toggle"><span id="menu-toggle" class="navbar-toggler-icon"></span></button>

		<!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->F
		<h4 class="align-bottom text-success mx-auto">E-Money Dream Admin Panel</h4>

	</nav>

	<div id="main_content" class="container-fluid">
		<h1 class="display-4 text-secondary">New Post</h1>


		<div class="container-fluid text-primary">

			<div class="row mt-2">
				<div class="col text-center">
					<h1>Create A New Post</h1>
				</div>
			</div>


			<form id="create_post" onsubmit="submit_func();" class="p-3 border rounded border-primary m-2" method="POST" action="php/create_post.php">
				<div class="form-group">
					<label for="title">Title</label>
					<input name="title" id="title" class="form-control" type="text">
				</div>

				<div class="form-group">
					<label for="description">Description</label>
					<input name="desc" id="desc" class="form-control" type="text" placeholder="Short Description Of The Post">
				</div>

				<div class="form-group">
					<label for="description">Keywords</label>
					<input name="desc" id="desc" class="form-control" type="text" placeholder="Separate Keywords By Spaces">
				</div>

				<p>Choose Image </p>
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="customFile">
					<label class="custom-file-label" for="customFile">Choose Image For The Post</label>
				</div>

				<div class="form-group">
					<input name="desc" id="desc" class="btn rounded mt-3 btn-outline-primary" type="submit" value="Create Post">
				</div>

			</form>
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