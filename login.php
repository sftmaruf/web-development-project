<?php
require "header.php";

if (isset($_SESSION['userEmail'])) {
    header('location: http://localhost/Project/main.php');
} else { ?>
    <main class="logggin-container container d-flex flex-column justify-content-center align-items-center">
        <form class="login-form" action="PHP/login.script.php" method="POST">
            <h4>Sign In</h4>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input name="userEmail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="userPwd" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->
            <button id="login-button" name="submit" type="submit" class="btn btn-primary">Submit</button>
        </form>

        <div class="auth-failed-alert" hidden>
            <div class='alert alert-danger'>username or password wrong</div>
        </div>
    </main>

    <script>
        const urlQuery = window.location.search.substring(1);
        const urlPath = window.location.pathname.split('/')[2];
        const locationNavigation = performance.navigation.type;
        const reload = performance.navigation.TYPE_RELOAD;

        if (urlPath === 'login.php') {
            document.getElementById('login-button-navbar').style.display = 'none';
            document.getElementById('login-button').innerHTML = 'Login';
        }

        if (urlQuery === 'cpou') {
            document.getElementsByClassName('auth-failed-alert')[0].hidden = false;
        }

        if (locationNavigation === reload) {
            window.location.search = '';
        }
    </script>
    
<?php }
require "footer.php";
?>