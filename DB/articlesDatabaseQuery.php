<?php
function ArticlesFetchedFromDB($conn)
{
    $allPostsFromDB = array();
    $query = 'SELECT * FROM posts';
    $stmt = makeStatementInit($conn, $query);

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $allPostsFromDB[] =  $row;
        }

        return $allPostsFromDB;
    } else {
        return false;
    }
}

function articleAuthorName($conn, $uID)
{
    $que = "SELECT * FROM userauth WHERE uID = ?;";

    $stat = makeStatementInit($conn, $que);

    if ($stat === 'false') {
        header('Location: http://localhost/Project/login.php');
        exit();
    }

    mysqli_stmt_bind_param($stat, "s", $uID);
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

function singleArticleInfoFromDB($conn, $pID)
{
    $que = "SELECT * FROM posts WHERE pID = ?;";

    $stat = makeStatementInit($conn, $que);

    if ($stat === 'false') {
        header('Location: http://localhost/Project/main.php');
        exit();
    }

    mysqli_stmt_bind_param($stat, "s", $pID);
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
