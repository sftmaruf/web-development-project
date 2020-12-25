<?php
function createUser($conn, $uName, $uEmail, $uPassword, $uConfirmPassword)
{
    $que = "INSERT INTO userauth (uName, uEmail, uPwd) VALUES (?, ?, ?);";
    $stat = makeStatementInit($conn, $que);

    if (!isPasswordMatched($uPassword, $uConfirmPassword)) {
        header('Location: http://localhost/Project/login.php');
        exit();
    }

    $hashedPassword = password_hash($uPassword, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stat, "sss", $uName, $uEmail, $hashedPassword);
    mysqli_stmt_execute($stat);
}

function isUserAuthenticated($conn, $uEmail, $uPassword)
{
    require 'common.script.php';
    $row = isUserExist($conn, $uEmail);

    if ($row === "false") {
        return false;
    } else {
        if (password_verify($uPassword, $row["uPwd"])) {
            return $row["uEmail"];
        } else {
            return false;
        }
    }
}
