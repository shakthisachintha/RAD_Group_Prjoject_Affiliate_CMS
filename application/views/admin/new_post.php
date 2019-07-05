<div class="bg-dark border-right" id="sidebar-wrapper">
	<div class="text-success sidebar-heading">Admin Panel </div>
	<div class="list-group list-group-flush">
	<a href="/admin/profile" class="list-group-item text-primary list-group-item-action bg-dark">Profile</a>
		<a href="/admin/links" class="list-group-item text-primary list-group-item-action bg-dark">Link Clicks</a>
		<a href="/admin/linkgen" class="list-group-item text-primary list-group-item-action bg-dark">Generate Link</a>
		<a href="/admin/contacts" class="list-group-item text-primary list-group-item-action bg-dark">Contact Messages</a>
		<a href="/admin/pageviews" class="list-group-item text-primary list-group-item-action bg-dark">Pageviews</a>
		<a href="/admin/ebates" class="list-group-item text-primary list-group-item-action bg-dark">Ebates Form</a>
		<a href="/admin/fiver" class="list-group-item text-primary list-group-item-action bg-dark">Fiverr Form</a>
		<a href="#" class="list-group-item text-primary list-group-item-action bg-black">New Post</a>
		<a href="/admin/mailnew" class="list-group-item text-primary list-group-item-action bg-dark">Send Mails</a>
		<a href="/admin/mailoutbox" class="list-group-item text-primary list-group-item-action bg-dark">View Mails</a>
		
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
		<h1 class="display-4 text-secondary">New Post</h1>


		<div class="container-fluid text-primary">

			<div class="row mt-2">
				<div class="col text-center">
					<h1>Create A New Post</h1>
				</div>
			</div>


			<form id="create_post_form" class="p-3 border rounded border-primary m-2" enctype="multipart/form-data" method="POST" action="/Postcontent/create">
				<div class="form-group">
					<label for="title_eng">Post Title English</label>
					<input name="title_eng" id="title_eng" class="form-control" type="text">
				</div>

				<div class="form-group">
					<label for="title_sin">Post Title Sinhala</label>
					<input name="title_sin" id="title_sin" class="form-control" type="text">
				</div>

				<div class="form-group">
					<label for="description">Meta Description</label>
					<input name="desc" id="desc" class="form-control" type="text" placeholder="Short Description Of The Post">
				</div>

				<div class="form-group">
					<label for="keywords">Keywords</label>
					<input name="keywords" id="keywords" class="form-control" type="text" placeholder="Separate Keywords By Commas">
				</div>

				<p>Choose Image </p>
				<div class="custom-file form-group">
					<input type="file" class="custom-file-input" name="post_image" id="customFile">
					<label class="custom-file-label" for="customFile">Choose Image For The Post</label>
				</div>

				<div class="mt-3 form-group">
					<label for="">Language</label>
					<br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" checked name="lang" id="lang_eng" value="eng" class="custom-control-input">
						<label class="custom-control-label" for="lang_eng">English</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" name="lang" value="sin" id="lang_sin" class="custom-control-input">
						<label class="custom-control-label" for="lang_sin">Sinhala</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" name="lang" value="both" id="lang_both" class="custom-control-input">
						<label class="custom-control-label" for="lang_both">Both</label>
					</div>
				</div>

				<div class="mt-3 form-group">
					<label for="">Publish</label>
					<br>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="customRadioInline1" checked name="publish" value="yes" class="custom-control-input">
						<label class="custom-control-label" for="customRadioInline1">Yes</label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="customRadioInline2" name="publish" value="no" class="custom-control-input">
						<label class="custom-control-label" for="customRadioInline2">No</label>
					</div>
				</div>

				<div class="form-group">
					<label for="author">Author</label>
					<input name="author" id="author" class="form-control" type="text" readonly value="<?=$this->session->userdata('nickname') ?>" placeholder="Separate Keywords By Commas">
				</div>



				<div class="mt-3 mb-2 form-group">
					<label for="summernote">Post Content English</label>
					<div class="border bg-light border-primary">
						<div id="summernote1" class="summernote">
						</div>
					</div>
				</div>

				<div class="mt-3 mb-2 form-group">
					<label for="summernote">Post Content Sinhala</label>
					<div class="border bg-light border-primary">
						<div id="summernote2" class="summernote">
						</div>
					</div>
				</div>

				<div class="form-group">
					<textarea style="display:none" name="post_content_eng" id="post_content_eng" rows="" cols=""></textarea>
				</div>

				<div class="form-group">
					<textarea style="display:none" name="post_content_sin" id="post_content_sin" rows="" cols=""></textarea>
					<input class="btn rounded mt-3 btn-outline-primary" type="submit" value="Create Post">
				</div>

			</form>
		</div>



	</div>
</div>
<!-- /#page-content-wrapper -->

<script>
	$(document).ready(function() {
		$('.summernote').summernote();

		$("#create_post_form").submit(function(e) {
			var strEng = $('#summernote1').summernote('code');
			strEng = strEng.trim();
			$("#post_content_eng").text(strEng);

			var strSin = $('#summernote2').summernote('code');
			strSin = strSin.trim();
			$("#post_content_sin").text(strSin);

		});

	});

	// Add the following code if you want the name of the file appear on select
	$(".custom-file-input").on("change", function() {
		var fileName = $(this).val().split("\\").pop();
		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});
</script>