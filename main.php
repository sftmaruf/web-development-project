<?php
require "header.php";
?>
<main class="container main-container">
    <div class="row">
        <aside id='mainpage-left-component' class="col-lg-3 col-xl-3">
            <nav class="sidebar">
                <?php if (!isset($_SESSION['userEmail'])) { ?>
                    <a href="login.php"><strong>Sign In/Up</strong></a>
                <?php } ?>
                <a href="tagDescriptiveViewerComponent.php">Tag</a>
                <a href="index.html">About</a>
                <a href="">Faq</a>
                <div class="icon-container">
                    <a href="https://www.facebook.com/antu.saha.31"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    <a href="https://twitter.com/maruf_shafayet"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="https://github.com/sftmaruf"><i class="fa fa-github" aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com/antu_saha__/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href=""><i class="fa fa-twitch" aria-hidden="true"></i></a>
                </div>
            </nav>

            <nav class="sidebar second-sidebar">
                <h6><strong>Popular Tags</strong></h6>
                <div id="tag-container" class="tags-container"></div>
            </nav>
        </aside>

        <main id='mainpage-main-component' class="col-lg-9 col-xl-6">
            <div>
                <nav class="navbar center-navbar-alignment navbar-expand-lg navbar-light mb-3">
                    <div class="container pt-2 pb-2">
                        <a class="navbar-brand" href="#"><strong>Post</strong></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup1" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <div class="navbar-toggler-icon"></div>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup1">
                            <div style="height:auto" class="hover-effect option-container navbar-nav ml-auto">
                                <a class="check-active nav-link active mr-2" href="#">Feed</a>
                                <a class="check-active nav-link mr-2" href="#">Week</a>
                                <a class="check-active nav-link mr-2" href="#">Month</a>
                                <a class="check-active nav-link mr-2" href="#">Year</a>
                                <a class="check-active nav-link mr-2" href="#">Infinity</a>
                                <a class="check-active nav-link mr-2" href="#">Latest</a>
                            </div>
                        </div>
                    </div>
                </nav>

                <?php
                require 'postComponentOnMainPage.php';
                ?>
            </div>
        </main>

        <aside id='mainpage-right-component' class="col-lg-0 col-xl-3 p-0">
            <?php if (!isset($_SESSION['userEmail'])) { ?>
                <div class="card-background login-card d-flex flex-column justify-content-center p-3">
                    <h4><strong>DEV is a community of <br> 518,714 amazing <br> developers </strong></h4>
                    <p>We're a place where coders share, stay up-to-date and grow their careers. </p>

                    <div>
                        <button class="btn btn-primary w-100">Create new account</button>
                        <button class="btn btn-light texr-primary w-100">Log in</button>
                    </div>
                </div>
            <?php } ?>
            <br>
            <div class="card-background coronadetails-card d-flex flex-column justify-content-center p-3">
                <div>
                    <h4><strong>Corona Updates</strong></h4>
                </div>
                <h4>Total Cases: <span id="coronabd-total-cases"></span></h4>
                <h4>Today Cases: <span id="coronabd-today-cases"></span></h4>
            </div>
            <br>
            <div id="articles-container" class="card-background highlighted-articles">
                <div class="p-3">
                    <h4><strong>Dev.to articles</strong></h4>
                </div>
            </div>
        </aside>
    </div>
</main>
<script src="JavaScript/blog.js"></script>

<?php
require "footer.php";
?>