<?php
function userExistInDB($conn, $uEmail)
{
    $que = "SELECT * FROM userauth WHERE uEmail = ?;";

    $stat = makeStatementInit($conn, $que);

    mysqli_stmt_bind_param($stat, "s", $uEmail);
    mysqli_stmt_execute($stat);

    $result = mysqli_stmt_get_result($stat);

    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    } else {
        $row = false;
        return $row;
    }

    mysqli_stmt_close($stat);
}
