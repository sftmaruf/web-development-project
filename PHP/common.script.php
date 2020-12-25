<?php
function isUserExist($conn, $uEmail)
{
    $row = userExistInDB($conn, $uEmail);
    return $row;
}