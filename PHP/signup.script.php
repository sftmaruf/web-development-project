<?php
    if(isset($_POST['submit'])){
        $uName = $_POST["userName"];
        $uEmail = $_POST["userEmail"];
        $uPassword = $_POST['userPwd'];
        $uConfirmPassword = $_POST['userConfirmPwd'];

        require 'dbh.script.php';
        require "function.script.php";
        require 'PHP/common.script.php';
        require "../DB/signupDatabaseQuery.php";

        if(isEmpty($uName, $uEmail, $uPassword, $uConfirmPassword)){
            header('Location: http://localhost/Project/login.php');
            exit();
        }

        if(!isPasswordMatched($uPassword, $uConfirmPassword)){
            header('Location: http://localhost/Project/login.php');
            exit();
        }

        if(isUserExist($conn, $uEmail)){
            header('Location: http://localhost/Project/PHP/login.php?userexist');
            exit();
        }else{
          createUser($conn, $uName, $uEmail, $uPassword, $uConfirmPassword);
          header('Location: http://localhost/Project/login.php?email:'.$uEmail);
          exit();
        }
    }else{
        header('Location: http://localhost/Project/main.php');
        exit();
    }
 
    