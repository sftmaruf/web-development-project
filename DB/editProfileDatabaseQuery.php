<?php

function editNameOfCurrentUser($conn, $userNewName, $userID)
{
    $query = 'UPDATE userauth SET uName = ? WHERE uid = ?';

    $stmt = makeStatementInit($conn, $query);

    mysqli_stmt_bind_param($stmt, 'ss', $userNewName, $userID);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    return true;
}

function editPasswordOfCurrentUser($conn, $newPassword, $userID)
{
    $query = 'UPDATE userauth SET uPwd = ? WHERE uid = ?';

    $stmt = makeStatementInit($conn, $query);

    $hashPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, 'ss', $hashPassword, $userID);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    return true;
}