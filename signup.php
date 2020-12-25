<?php
    require "header.php";
?>
<main class="logggin-container container d-flex justify-content-center align-items-center">
    <form class="login-form" action="PHP/signup.script.php" method="POST">
        <h4>Sign Up</h4>
        <div class="form-group">
            <label for="userName">User name</label>
            <input name="userName" type="text" class="form-control" id="userName" aria-describedby="emailHelp" placeholder="Enter user name">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input name="userEmail" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="pwd">Password</label>
            <input name="userPwd" type="password" class="form-control" id="pwd" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="confirmPwd">Confirm Password</label>
            <input name="userConfirmPwd" type="password" class="form-control" id="confirmPwd" placeholder="Confirm password">
        </div>
        <button id="signup-button" name="submit" type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>

<script>
     const urlPath = window.location.pathname.split('/')[2];
     if(urlPath === 'signup.php'){
        document.getElementById('signup-button-navbar').style.display = 'none';
        document.getElementById('signup-button').innerHTML = 'Signup';
     }
</script>
 
<?php
    require "footer.php";
 ?>