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
		<a href="/admin/newpost" class="list-group-item text-primary list-group-item-action bg-dark">New Post</a>
		<a href="#" class="list-group-item text-primary list-group-item-action bg-black">Send Mails</a>
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
		<h1 class="display-4 text-secondary">Send an Email</h1>

		<!-- content goes here -->

		<div class="row">
			<div class="col">
				<h1 class="display-5 text-center text-primary">Send Emails To Anyone</h1>
				<form id="link_gen" method="post" class="border text-primary border-primary p-4 m-3 rounded" action="/EmailController/send">
				<div class="form-group">
					<label for="Receiver Email">Receiver Email</label>
					<input placeholder="Receiver Email" id="Receiver Email" class="form-control" type="email" name="to">
				</div>
				
				<div class="form-group">
					<label for="subject">Subject</label>
					<input id="subject" class="form-control" type="text" name="subject">
				</div>
               
			   <div class="form-group">
				   <label for="message">Message</label>
				   <textarea rows="6" id="message" class="form-control" name="message" placeholder="Type your message here"></textarea>
			   </div>
               
                
                <input type="submit" name="send" class="btn-primary btn"value="Send Email" />
                

				</form>
  
		</div>
		
	</div>
	 
<!-- /#page-content-wrapper -->

