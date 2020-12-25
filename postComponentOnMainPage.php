<section style="height: auto" class="d-flex flex-column align-items-center">
    <?php
    require 'PHP/dbh.script.php';
    require 'PHP/parentScript.script.php';

    $allPostsFromDB = articlesFetched($conn);
    $colors = array('#E1704E', '#24A9F0', '#2BCADA', '#A9F5B8', '#20D67E');

    foreach ($allPostsFromDB as $post) {
        $ArticleAuthorName = authorNameFetched($conn, $post['pUserID']);
        $shortUserName = makeUserNameShort($ArticleAuthorName['uName']);
        $extract_date = extractMonthAndYearFromDate($post['pTime']);
        $prepared_tags = prepareTags($post['pTags']);
        $randomColor = rand(0, count($colors) - 1);

    ?>
        <a href="postDescriptiveViewerComponent.php?pID=<?php echo $post['pID'] ?>&uName=<?php echo $ArticleAuthorName['uName'] ?>" class="post-component rounded row w-100 mb-3 p-3">
            <div class="post-author-image" class="col-1">
                <h6 style="background-color: <?php echo $colors[$randomColor] ?>;" class="rounded-circle d-flex justify-content-center align-items-center">
                    <?php echo $shortUserName ?>
                </h6>
            </div>
            <div class="post-header-info col-10 d-flex flex-column align-items-start">
                <h6 id="post-author"><?php echo $ArticleAuthorName['uName'] ?></h6>
                <small class="mb-0"><?php echo $extract_date ?></small>
                <h2 id="post-title"><?php echo $post['pTitle'] ?></h2>
                <small><?php echo $prepared_tags ?></small>
            </div>
        </a>
    <?php } ?>
</section>