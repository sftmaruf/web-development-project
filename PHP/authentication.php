<?php
    if(isset($_POST['submit'])){
        $uName = $_POST["userName"];
        $uEmail = $_POST["userEmail"];
        $uPassword = $_POST['userPwd'];
        $uConfirmPassword = $_POST['userConfirmPwd'];

        require 'dbh.php';
        require "function.php";

        if(!isEmpty($uName, $uEmail, $uPassword, $uConfirmPassword)){
            $que = "INSERT INTO userauth (uName, uEmail, uPwd) VALUES (?, ?, ?);";
            $stat = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stat, $que)){
                header('Location: http://localhost/Project/login.php');
                exit();
            }

            if(!isPasswordMatched($uPassword, $uConfirmPassword)){
                header('Location: http://localhost/Project/login.php');
                exit();
            }

            mysqli_stmt_bind_param($stat, "sss", $uName, $uEmail, $uPassword);
            mysqli_stmt_execute($stat);

        }else{
            header('Location: http://localhost/Project/PHP/authentication.php');
            exit();
        }
    }else{
        header('Location: http://localhost/Project/main.php');
        exit();
    }
 
    