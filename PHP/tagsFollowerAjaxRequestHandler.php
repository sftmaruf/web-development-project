<?php
require 'dbh.script.php';
require '/xampp/htdocs/Project/DB/parentDatabaseQuery.php';

$tagID = $_POST['tagID'];
$userID = $_POST['userID'];
$condition = $_POST['condition'];

if ($condition === 'send') {
    $response = insertDataIntoTagsFollowerTable($conn, $tagID, $userID);
    handleResponse($response);
} else {
    $response = DeleteFollowingTags($conn, $tagID, $userID);
    handleResponse($response);
}


function handleResponse($response)
{
    if ($response) {
        echo json_encode($response);
    } else {
        echo json_encode(false);
    }
}

function retriveAllFollowedTagsByCurrentUser($conn, $uid){
    $followedTags = retriveAllFollowedTagsByCurrentUserFromDB($conn, $uid);
    return $followedTags;
}