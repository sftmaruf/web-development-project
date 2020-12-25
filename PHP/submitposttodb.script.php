<?php
session_start();
require 'dbh.script.php';
require '/xampp/htdocs/Project/PHP/parentScript.script.php';

date_default_timezone_set("Asia/Dhaka");
$pDate = date("Y-m-d H:i:s");

$pTitle = $_POST['pTitle'];
$pTags = $_POST['pTags'];
$pBody = $_POST['pBody'];
$userEmail = $_SESSION['userEmail'];

$userDetailsRowFromDB = isUserExist($conn, $userEmail);
$currentUserID = $userDetailsRowFromDB['uid'];


if (empty($pTitle) || empty($pTags) || empty($pBody)) {
    echo json_encode('empty');
} else {
    $query = 'INSERT INTO posts(pTitle, pBody, pTags, pTime, pUserID) VALUES (?, ?, ?, ?, ?)';
    $stmt = makeStatementInit($conn, $query);

    mysqli_stmt_bind_param($stmt, 'sssss', $pTitle, $pBody, $pTags, $pDate, $currentUserID);
    mysqli_stmt_execute($stmt);

    $response = pushDataIntoTagsTable($conn, $currentUserID, $pTags);
    if ($response) {
        echo json_encode('successful');
    } else {
        echo json_encode('error');
    }

    mysqli_stmt_close($stmt);
}

function pushDataIntoTagsTable($conn, $currentUserID, $pTags)
{
    $last_post_info_of_current_user = lastPostFromCurrentUser($conn, $currentUserID);
    $tagswithHashPrefix = prepareTags($pTags);

    $splittedTagsBySpace = explode(' ', $tagswithHashPrefix);

    foreach ($splittedTagsBySpace as $tag) {
        $q = 'INSERT INTO tags(tName, tPostID) VALUES (?, ?)';

        $stmt = makeStatementInit($conn, $q);

        mysqli_stmt_bind_param($stmt, 'ss', $tag, $last_post_info_of_current_user['pID']);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
    }

    return true;
}

function lastPostFromCurrentUser($conn, $currentUserID)
{
    $q = 'SELECT pID FROM posts, userauth WHERE uID = ? ORDER BY `pTime` DESC LIMIT 1';
    $st = makeStatementInit($conn, $q);

    mysqli_stmt_bind_param($st, 's', $currentUserID);
    mysqli_stmt_execute($st);

    $result = mysqli_stmt_get_result($st);

    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    } else {
        $row = false;
        return $row;
    }

    mysqli_stmt_close($st);
}