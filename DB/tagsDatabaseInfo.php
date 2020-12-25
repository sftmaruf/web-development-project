<?php
function retriveAllTagsFromDB($conn)
{
    $alltagsFromDB = array();
    $query = 'SELECT * FROM tags';

    $stmt = makeStatementInit($conn, $query);

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $alltagsFromDB[] =  $row;
        }
        
        return $alltagsFromDB;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}