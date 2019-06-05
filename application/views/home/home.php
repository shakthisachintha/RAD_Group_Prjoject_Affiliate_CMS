<div class="row sticky-top">
    <div class="col">
        <!-- Navigation Pane -->
        <nav class="navbar navbar-expand-md navbar-dark elegant-color-dark shadow-lg mb-4">
            <a class="navbar-brand" href="https://www.emoneydream.com"><img src="Images/favicon.png" style="width:20px;" alt="E-Money Dream">&nbsp;E-Money
                Dream</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#top">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Support</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <div style="display: inline-flex;">
                            <a class="nav-link text-success" target="new">Login</a>
                            <a class="nav-link text-danger" target="new">Register</a>
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

<div class="ml-2 mr-2 row">
    <?php $count = 2 ?>
    <?php foreach ($allpost->result() as $row) : ?>
        <?php $count++ ?>
        <?php if ($count == 3) {
            $count = 0;
            echo "</div>";
            echo "<div class='ml-2 mr-2 row'>";
        } ?>
        <div class="col-md yes-margin">
            <div class="card border border-info rounded">
                <img class="card-img-top" src="<?= $row->imgpath ?>" alt="fiverr">
                <div class="card-body">
                    <h4 class="card-title"><?= $row->title ?></h4>
                    <p class="card-text"><?= $row->description ?></p>
                    <p>Read More</p>
                    <a href="post/fiver/eng.html" target="self" disable class="btn btn-sm btn-primary">English</a>
                    <a href="post/fiver/sin.html" target="self" class="btn btn-sm btn-primary">සිංහල</a>
                    <span class="float-sm-right">
                        <p class="text-black-50 text-nowrap small"><?= $row->date ?></p>
                    </span>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
    <?php if ($count < 3 && $count<0) {
        echo "<div class='col-md yes-margin'>";
        echo "<div class='container'>";
        echo "    <!-- New Post -->";
        echo "</div></div>";
        $count++;
    } ?>
</div>

