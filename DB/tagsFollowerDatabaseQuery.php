<?php
function insertDataIntoTagsFollowerTable($conn, $tagID, $followerID)
{
    $query = 'INSERT INTO tagsfollower(tID, fID) VALUES (?, ?)';

    $stmt = makeStatementInit($conn, $query);

    mysqli_stmt_bind_param($stmt, 'ss', $tagID, $followerID);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    return true;
}

function retriveAllFollowedTagsByCurrentUserFromDB($conn, $followerID)
{
    $listOfFollowedTags = array();
    $query = 'SELECT * FROM tagsfollower WHERE fID = ?';

    $stmt = makeStatementInit($conn, $query);

    mysqli_stmt_bind_param($stmt, 's', $followerID);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $listOfFollowedTags[] = $row['tID'];
        }

        mysqli_stmt_close($stmt);
        return $listOfFollowedTags;
    } else {
        mysqli_stmt_close($stmt);
        return $listOfFollowedTags;
    }
}

function DeleteFollowingTags($conn, $tagID, $followerID){
    $query = 'DELETE FROM tagsfollower WHERE tID = ? AND fID = ?';

    $stmt = makeStatementInit($conn, $query);
    
    mysqli_stmt_bind_param($stmt, 'ss', $tagID, $followerID);
    mysqli_stmt_execute($stmt);
    
    return true;
}
