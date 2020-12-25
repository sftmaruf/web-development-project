<?php

function makeStatementInit($conn, $query)
{
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        return false;
    }

    return $stmt;
}
