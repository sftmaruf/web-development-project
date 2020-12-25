<?php
require 'header.php';
require 'PHP/dbh.script.php';
require 'PHP/parentScript.script.php';

$postID = $_GET['pID'];
$articleAuthorName = $_GET['uName'];
$articleDetails = singleArticleFetched($conn, $postID);

$read_duration = calculateArticleReadTime(strlen($articleDetails['pBody']));
$extract_date = extractMonthAndYearFromDate($articleDetails['pTime']);
$shortUserName = makeUserNameShort($articleAuthorName);
$prepared_tags = prepareTags($articleDetails['pTags']);
$author_name_string = $articleAuthorName . ' ' . $extract_date . ' . ' . $read_duration . " ";
?>

<section class="container">
    <br>
    <div style="width:100%;max-width: 806px;background-color: white;" class="d-flex flex-column rounded p-5">
        <h1><strong><?php echo $articleDetails['pTitle'] ?></strong></h1>
        <div><?php echo $prepared_tags ?></div>
        <div class="d-flex align-items-center mt-2">
            <div class="post-author-image" class="col-1 p-0">
                <h6 class="rounded-circle d-flex justify-content-center align-items-center">
                    <?php echo $shortUserName ?>
                </h6>
            </div>
            <h6 class="ml-2"><?php echo $author_name_string ?><small> min read</small></h6>
        </div>
        <div class="mt-4"><?php echo nl2br($articleDetails['pBody']); ?></div>
    </div>
</section>

<?php
require 'footer.php';
?>