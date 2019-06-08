<div class="row sticky-top">
    <div class="col">
        <!-- Navigation Pane -->
        <nav class="navbar navbar-expand-md navbar-dark elegant-color-dark shadow-lg mb-4">
            <a class="navbar-brand" href="https://www.emoneydream.com"><img src="/Images/favicon.png" style="width:20px;" alt="E-Money Dream">&nbsp;E-Money
                Dream</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#top"><?= $row->title ?></a>
                    </li>

                    <?php if ($row->title == "Free Fiverr Reviews") : ?>

                        <li class="nav-item">
                            <a class="nav-link" href="/postcontent/regfiver">Registration Form</a>
                        </li>

                    <?php endif; ?>

                    <?php if ($row->title == "Earn Money From Ebates" || $row->title == "Ebates මගින් මුදල් සෙවීම") : ?>

                        <li class="nav-item">
                            <a class="nav-link" href="/postcontent/ebatesref">Referal Claim</a>
                        </li>

                    <?php endif; ?>

                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <div style="display: inline-flex;">
                            <?php if ($this->session->userdata('logged_in')) : ?>
                                <a href=/user/profile/<?= $this->session->userdata('userid') ?> class="text-success btn nav-link"><?= $this->session->userdata('name') ?></a>
                                <a href=/user/logout class="text-light small btn nav-link">Logout</a>

                            <?php else : ?>
                                <a class="btn text-success nav-link" data-toggle="modal" data-target="#login_modal">Login</a>
                                <a class="btn text-warning nav-link" data-toggle="modal" data-target="#reg_modal">Register</a>
                            <?php endif; ?>

                            <a class="nav-link" target="new" href="https://www.facebook.com/EmoneyDream"><i class='fab fa-facebook-square' style='font-size:24px'></i></a>&nbsp;&nbsp;
                            <a class="nav-link" target="new" href="https://www.google.com"><i class='fab fa-google-plus-square' style='font-size:24px'></i></a>&nbsp;&nbsp;
                            <a class="nav-link" target="new" href="https://www.youtube.com/channel/UC7_87Azo57GFGBiWIkr7TvA"><i class='fab fa-youtube-square' style='font-size:24px'></i></a>&nbsp;&nbsp;
                            <a class="nav-link" target="new" href="https://www.mybloglk.com"><i class='fab fa-blogger' style='font-size:24px'></i></a>
                        </div>

                    </li>
                </ul>

            </div>
        </nav>

    </div>
</div>


<div class="row yes-margin">
    <div class="col-md-2">
        <!-- Empty Col -->
    </div>
    <div class="col-md-7">
        <div class="border border-top-0 border-bottom-0 border-primary container-fluid">
            <br>
            <h4 class="display-4 text-primary text-center">
                <?= $row->title ?>
            </h4>
            <br>

            <div class="container">
                <div align=center class="mx-auto">
                    <img align="center" class="w-75" src="<?= $row->imgpath ?>" alt="post_img">
                </div>
            </div>
            <br>
            <?= $row->content ?>
        </div>
    </div>
    <!-- Sidebar -->
    <div class="col-md-3">

    <div class="ml-1 mr-1 row">
				<div class="col-md-12 mb-1">
					<h4 class="text-muted font-weight-light">Recent Posts</h4>
				</div>
				<div class="col-md-12">
                    <?php foreach ($recentpost->result() as $row) : ?>
                    <?php if($row->lang=='both'){
                        $sin="";
                        $eng="";
                    }elseif($row->lang=='sin'){
                        $sin="";
                        $eng="disabled";
                    }elseif($row->lang=='eng'){
                        $sin="disabled";
                        $eng="";
                    }else{
                        $sin="disabled";
                        $eng="disabled";
                    }  ?>

					<div class="row">
						<div class="col-md-12">

							<div class="card text-dark bg-light mb-2">
								<h5 class="card-header"><?= $row->title_sin ?></h5>
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<img class="w-100" src="<?= $row->imgpath ?>" alt="fiverr">
										</div>
										<div class="col-7">
											Read More<br>
											<a href="/postcontent/view/eng/<?=$row->id?>" target="self" 
												class="btn <?=$eng ?> mb-2 btn-sm btn-primary">English
											</a>

											<a href="/postcontent/view/sin/<?=$row->id?>" target="self" 
												class="btn <?=$sin ?> btn-sm mb-2 btn-primary">සිංහල
											</a>
										</div>

									</div>

								</div>
							</div>

						</div>
					</div>

					<?php endforeach; ?>
				</div>
			</div>


			<div class="mt-1 ml-1 mr-1 row">

				<div class="col-md-12">
					<hr style="height: 1px !important" class="bg-secondary">
					<h4 class="text-muted font-weight-light">Popular Posts</h4>
				</div>
				<div class="mt-1 col-md-12">
                    <?php foreach ($top_post->result() as $row): ?>
                    <?php if($row->lang=='both'){
                        $sin="";
                        $eng="";
                    }elseif($row->lang=='sin'){
                        $sin="";
                        $eng="disabled";
                    }elseif($row->lang=='eng'){
                        $sin="disabled";
                        $eng="";
                    }else{
                        $sin="disabled";
                        $eng="disabled";
                    }  ?>

                   
					<div class="row">
						<div class="col-md-12">

							<div class="card text-dark bg-light mb-2">
								<h5 class="card-header"><?= $row->title_sin ?></h5>
								<div class="card-body">
									<div class="row">
										<div class="col-5">
											<img class="w-100" src="<?= $row->imgpath ?>" alt="fiverr">
										</div>
										<div class="col-7">
											Read More<br>
											<a href="/postcontent/view/eng/<?=$row->id?>" target="self" 
												class="btn mb-2 <?=$eng ?> btn-sm btn-primary">English
											</a>

											<a href="/postcontent/view/sin/<?=$row->id?>" target="self" 
												class="btn <?=$sin ?> btn-sm mb-2 btn-primary">සිංහල
											</a>
										</div>

									</div>

								</div>
							</div>

						</div>
					</div>

                    <?php endforeach; ?>

                </div>
               
			</div>

    </div>
</div>