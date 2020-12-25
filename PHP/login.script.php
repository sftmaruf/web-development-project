<?php  
    session_start();

    if(isset($_POST['submit'])){
        $uEmail = $_POST['userEmail'];
        $uPassword = $_POST['userPwd'];

        require "dbh.script.php";
        require "function.script.php";
        require '/xampp/htdocs/Project/DB/parentDatabaseQuery.php';

        if(empty($uEmail) || empty($uPassword)){
            header("Location: http://localhost/Project/login.php?empty");
            exit();
        }

        if(!$result = isUserAuthenticated($conn, $uEmail, $uPassword)){
            header("Location: http://localhost/Project/login.php?cpou");
            exit();
        }
        
        if(isset($result)){
            $_SESSION['userEmail'] = $result;
        }

        header("Location: http://localhost/Project/profile.php");
        exit();       
    }else{
        header("location: http://localhost/Project/main.php");
        exit();
    }if (empty($pTitle) || empty($pTags) || empty($pBody)) {
        header('http://localhost/Project/writepost.php');
    } else {
        $query = 'INSERT INTO posts(pTitle, pBody, pTags, pTime, pUserID) VALUES (?, ?, ?, ?, ?)';
        
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $query)){
            header('http://localhost/Project/writepost.php');
        }
    
        mysqli_stmt_bind_param($stmt, 'ssss', $pTitle, $pTags, $pbody, $pDate, );
    }
    