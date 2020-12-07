<?php
    require "header.php";
?>

 <main class="logggin-container container d-flex justify-content-center align-items-center">

     <?php
        if ($_POST['isLogIn'] == 'logIn') {
        ?>
         <form class="login-form">
             <h4>Sign In</h4>
             <div class="form-group">
                 <label for="exampleInputEmail1">Email address</label>
                 <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                 <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
             </div>
             <div class="form-group">
                 <label for="exampleInputPassword1">Password</label>
                 <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
             </div>
             <div class="form-check">
                 <input type="checkbox" class="form-check-input" id="exampleCheck1">
                 <label class="form-check-label" for="exampleCheck1">Check me out</label>
             </div>
             <button type="submit" class="btn btn-primary">Submit</button>
         </form>
     <?php
        } else {
     ?>
         <form class="login-form" action="PHP/authentication.php" method="POST">
             <h4 >Sign Up</h4>
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
             <button name="submit" type="submit" class="btn btn-primary">Submit</button>
         </form>
     <?php
        }
    ?>
 </main>

 <script>
     const value = window.location.pathname.split('/')[2];
     if(value === 'login.php'){
        document.getElementById('login-buttons').style.display = 'none';
     }
 </script>

 <?php
    require "footer.php";
 ?>