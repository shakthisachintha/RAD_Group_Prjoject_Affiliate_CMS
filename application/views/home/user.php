<div class="row sticky-top">
    <div class="col">
        <!-- Navigation Pane -->
        <nav class="navbar navbar-expand-md navbar-dark elegant-color-dark shadow-lg mb-4">
            <a class="navbar-brand" href="/index.php"><img src="/Images/favicon.png" style="width:20px;" alt="E-Money Dream">&nbsp;E-Money
                Dream</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">


                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <div style="display: inline-flex;">
                            <?php if ($this->session->userdata('logged_in')) : ?>
                                <a href=/user/profile/<?= $this->session->userdata('userid') ?> class="text-white btn btn-success nav-link"><?= $this->session->userdata('name') ?></a>
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

<div id="main_content" class="container-fluid">
    <h1 class="display-4 text-secondary">Profile</h1>

    <!-- Your Content Goes Here -->
    <div class="m-5">
        <div class="form-group">
            <label class="text-primary" for="lblUser">Name</label>
            <input type="text" value="<?= $this->session->userdata('name') ?>" class="form-control">
        </div>
        <div class="form-group">
            <label class="text-primary" for="lblEmail">Email</label>
            <input type="text" value="<?= $this->session->userdata('email') ?>" class="form-control">
        </div>
    </div>



    <h4 class="display-4 text-secondary">Change Password</h4>

    <?php if ($this->session->flashdata('errors')) : ?>
        <?php foreach ($this->session->flashdata() as $error) : ?>
         
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $error ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>

            <?php if ($this->session->flashdata('success')) : ?>
        <?php foreach ($this->session->flashdata() as $error) : ?>
         
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $error ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>


            <form class="text-primary m-5 mb-3" action="<?= base_url() ?>user/changePw" method="POST">

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

                <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="pwdChange">Change Password</button>
                </div>

            </form>

</div>