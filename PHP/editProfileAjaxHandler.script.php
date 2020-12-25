<?php
require 'dbh.script.php';
require '/xampp/htdocs/Project/DB/parentDatabaseQuery.php';

$userID = $_POST['userID'];
$condition = $_POST['condition'];

if ($condition === 'editPassword') {
    $userNewPassword = $_POST['userNewPassword'];
    $response = editPasswordOfCurrentUser($conn, $userNewPassword, $userID);
    response($response, 'pwdChanged');
} else {
    $userNewName = $_POST['userNewName'];
    $response = editNameOfCurrentUser($conn, $userNewName, $userID);
    response($response, 'true');
}


function response($response, $returnValue)
{
    if ($response) {
        echo json_encode($returnValue);
    } else {
        echo json_encode('false');
    }
}
