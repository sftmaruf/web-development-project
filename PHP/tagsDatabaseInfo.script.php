<?php
function retriveAllTags($conn){
    $allTagsFromDB = retriveAllTagsFromDB($conn);
    return $allTagsFromDB;
}