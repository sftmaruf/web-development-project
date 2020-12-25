<?php
function retriveAllFollowedTagsByCurrentUser($conn, $uid)
{
    $followedTags = retriveAllFollowedTagsByCurrentUserFromDB($conn, $uid);
    return $followedTags;
}
