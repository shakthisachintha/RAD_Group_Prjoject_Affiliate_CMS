<div class="bg-dark border-right" id="sidebar-wrapper">
	<div class="text-success sidebar-heading">Admin Panel </div>
	<div class="list-group list-group-flush">
		<a href="links" class="list-group-item text-primary list-group-item-action bg-dark">Link Clicks</a>
		<a href="contacts" class="list-group-item text-primary list-group-item-action bg-dark">Contact Messages</a>
		<a href="#" class="list-group-item text-primary list-group-item-action bg-black">Pageviews</a>
		<a href="ebates" class="list-group-item text-primary list-group-item-action bg-dark">Ebates Form</a>
		<a href="profile" class="list-group-item text-primary list-group-item-action bg-dark">Profile</a>
		<a href="newpost" class="list-group-item text-primary list-group-item-action bg-dark">New Post</a>
		<a href="mailnew" class="list-group-item text-primary list-group-item-action bg-dark">Send Mails</a>
		<a href="mailoutbox" class="list-group-item text-primary list-group-item-action bg-dark">View Mails</a>
		<a href="maildraft" class="list-group-item text-primary list-group-item-action bg-dark">Draft Mails</a>
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