<div class="bg-dark border-right" id="sidebar-wrapper">
	<div class="text-success sidebar-heading">Admin Panel </div>
	<div class="list-group list-group-flush">
		<a href="/admin/profile" class="list-group-item text-primary list-group-item-action bg-dark">Profile</a>
		<a href="/admin/links" class="list-group-item text-primary list-group-item-action bg-dark">Link Clicks</a>
		<a href="/admin/linkgen" class="list-group-item text-primary list-group-item-action bg-dark">Generate Link</a>
		<a href="/admin/contacts" class="list-group-item text-primary list-group-item-action bg-dark">Contact Messages</a>
		<a href="/admin/pageviews" class="list-group-item text-primary list-group-item-action bg-dark">Pageviews</a>
		<a href="#" class="list-group-item text-primary list-group-item-action bg-black">Ebates Form</a>
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
		<h1 class="display-4 text-secondary">Ebates Cash Back Forms</h1>

		<!-- content goes here -->

		<div class="mt-4" id="data_table">
			
			<div class="table-dark text-warning table-hover table-responsive-md">
				<table class="table">
					<thead class="thead-light">
						<tr>
							
							<th>name</th>
							<th>email</th>
							<th>phone</th>
							<th>pay_method</th>
							<th>pay_details</th>
						  
							
						</tr>
					</thead>
					<tbody>
					
						<?php foreach($query->result() as $result): ?>
						
						<tr>
							
							<td><?=$result->name;?></td>
							<td><?=$result->email;?></td>
							<td><?=$result->phone;?></td>
							<td><?=$result->pay_method;?></td>
							<td><?=$result->pay_details;?></td>
							
							
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>			
					
	</div>
</div>
<!-- /#page-content-wrapper -->





