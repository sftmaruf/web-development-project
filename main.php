<?php
    require "header.php";
?>

    <main class="container main-container">
        <div class="row">
            <aside class="col-3">
                <nav class="sidebar">
                    <a href=""><strong>Sign In/Up</strong></a>
                    <a href="">Tag</a>
                    <a href="">About</a>
                    <a href="">Faq</a>
                    <div class="icon-container">
                        <i class="fa fa-facebook-square" aria-hidden="true"></i>
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        <i class="fa fa-github" aria-hidden="true"></i>
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                        <i class="fa fa-twitch" aria-hidden="true"></i>
                    </div>
                </nav>

                <nav class="sidebar second-sidebar">
                    <h6><strong>Popular Tags</strong></h6>
                    <div id="tag-container" class="tags-container"></div>
                </nav>
            </aside>

            <main class="col-5.5">
                <nav class="navbar center-navbar-alignment navbar-expand-lg navbar-light">
                    <div class="container pt-2 pb-2">
                        <a class="navbar-brand" href="#"><strong>Post</strong></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup1" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup1">
                            <div class="hover-effect option-container navbar-nav ml-auto">
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
            </main>

            <aside class="pl-4 col-3">
                <div class="card-background login-card d-flex flex-column justify-content-center p-3">
                    <h4><strong>DEV is a community of <br> 518,714 amazing <br> developers </strong></h4>
                    <p>We're a place where coders share, stay up-to-date and grow their careers. </p>

                    <div>
                        <button class="btn btn-primary w-100">Create new account</button>
                        <button class="btn btn-light texr-primary w-100">Log in</button>
                    </div>
                </div>
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