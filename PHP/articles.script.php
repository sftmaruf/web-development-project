<?php
function articlesFetched($conn){
    $allArticlesFromDB =  ArticlesFetchedFromDB($conn);
    return $allArticlesFromDB;
}

function authorNameFetched($conn, $userID){
    $ArticleAuthorName = articleAuthorName($conn, $userID);
    return $ArticleAuthorName;
}

function singleArticleFetched($conn, $postID){
    $articleDetails = singleArticleInfoFromDB($conn, $postID);
    return $articleDetails;
}

