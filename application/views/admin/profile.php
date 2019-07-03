<div class="bg-dark border-right" id="sidebar-wrapper">
	<div class="text-success sidebar-heading">Admin Panel </div>
	<div class="list-group list-group-flush">
		<a href="#" class="list-group-item text-primary list-group-item-action bg-black">Profile</a>
		<a href="/admin/links" class="list-group-item text-primary list-group-item-action bg-dark">Link Clicks</a>
		<a href="/admin/linkgen" class="list-group-item text-primary list-group-item-action bg-dark">Generate Link</a>
		<a href="/admin/contacts" class="list-group-item text-primary list-group-item-action bg-dark">Contact Messages</a>
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

		<!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->
		<h4 class="align-bottom text-success mx-auto">E-Money Dream Admin Panel</h4>

	</nav>

	<div id="main_content" class="container-fluid">
		<h1 class="display-4 text-secondary">Profile</h1>

		<!-- Your Content Goes Here -->
		<div class="m-5">
			<div class="form-group">
				<label class="text-primary" for="lblUser">Name</label>
				<input type="text" value="<?= $this->session->userdata('admin_name') ?>" class="form-control">
			</div>
			<div class="form-group">
				<label class="text-primary" for="lblEmail">Email</label>
				<input type="text" value="<?= $this->session->userdata('admin_email') ?>" class="form-control">
			</div>
		</div>



		<h4 class="display-4 text-secondary">Change Password</h4>



		<form class="text-primary m-5 mb-3" action="<?= base_url() ?>Admin/changePw" method="POST">

			<div class="form-group">
				<label for="lblPasswd">Current Password</label>
				<input class="form-control" placeholder="Enter Password" name="curpwd" id="txtPwd" type="password">
			</div>

			<div class="form-group">
				<label for="lblPasswd">New Password</label>
				<input class="form-control" placeholder="Enter Password" name="newpwd" id="txtPwd" type="password">
			</div>

			<div class="form-group">
				<label for="lblRePasswd">Confirm Password </label>
				<input class="form-control" placeholder="Re-Enter Password" name="repwd" id="txtRePwd" type="password">
			</div>

			<div class="text-center">
				<button class="btn btn-primary" type="submit" name="pwdChange">Change Password</button>
			</div>

		</form>


		<h4 class="display-4 text-secondary">New Account</h4>



		<form class="text-primary m-5 mb-3" action="<?= base_url() ?>Admin/accNew" method="POST">

			<div class="form-group">
				<label for="lblname">Name</label>
				<input class="form-control" placeholder="New Admins's Name" name="name" id="txtPwd" type="text" required>
			</div>

			<div class="form-group">
				<label for="lblPasswd">Author Nickname</label>
				<input class="form-control" placeholder="This Will Be The Author Name" name="nickname" id="txtPwd" type="text" required>
			</div>

			<div class="form-group">
				<label for="lblPasswd">Email</label>
				<input class="form-control" required placeholder="Email Address" name="email" id="txtPwd" type="email" required>
			</div>

			<div class="form-group">
				<label for="lblPasswd">Password</label>
				<input class="form-control" placeholder="Enter Password" name="pwd" id="txtPwd" type="password" required>
			</div>

			<div class="form-group">
				<label for="lblRePasswd">Confirm Password </label>
				<input class="form-control" placeholder="Re-Enter Password" name="repwd" id="txtRePwd" type="password">
			</div>

			<div class="text-center">
				<button class="btn btn-primary" type="submit" name="newadmin">Create Account</button>
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