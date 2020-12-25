<?php
require 'header.php';
require 'PHP/dbh.script.php';
require 'PHP/parentScript.script.php';

$allTagsFromDB = retriveAllTags($conn);
$currentUser = isUserExist($conn, $_SESSION['userEmail']);
$followedTags = retriveAllFollowedTagsByCurrentUser($conn, $currentUser['uid']);

$colors = array('#000000', '#451F51', '#00692A', '#1B1B1B', '#CBCC84', '#182D96', '#46AC00', '#C42E00', '#870222');
?>
<section class="container d-flex flex-wrap mb-1 h-auto">
    <?php foreach ($allTagsFromDB as $tags) {
        $randomColor = rand(0, count($colors) - 1); ?>
        <div class="card m-2" style="width: 22rem;border-top: 15px solid <?php echo $colors[$randomColor] ?>;">
            <div class="card-body">
                <div></div>
                <h5 class="card-title"><strong><?php echo $tags['tName'] ?></strong></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                <?php if (in_array($tags['tID'], $followedTags)) { ?>
                    <button onclick="buttonStateHandler(this, <?php echo $tags['tID'] ?>,
                        <?php echo $currentUser['uid'] ?>)" class="btn btn-light">Following</button>
                <?php } else { ?>
                    <button onclick="buttonStateHandler(this, <?php echo $tags['tID'] ?>,
                        <?php echo $currentUser['uid'] ?>)" class="btn btn-light">Follow</button>
                <?php } ?>
            </div>
        </div>
    <?php } ?>

    <script>
        function buttonStateHandler(event, tID, uID) {
            const buttonState = event.innerHTML;
            buttonState === 'Follow' ? insertFollowerDataToDB(event, tID, uID) :
                deleteFollowerDataToDB(event, tID, uID);
        }

        function insertFollowerDataToDB(event, tID, uID) {
            prepareAjax(event, tID, uID, 'send', 'Following');
        }

        function deleteFollowerDataToDB(event, tID, uID) {
            prepareAjax(event, tID, uID, 'delete', 'Follow');
        }

        function prepareAjax(event, tID, uID, condition, label) {
            $.ajax({
                url: 'PHP/tagsFollowerAjaxRequestHandler.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    tagID: tID,
                    userID: uID,
                    condition: condition
                },
                success: (response) => {
                    event.innerHTML = label;
                }
            });
        }
    </script>
</section>

<?php
require 'footer.php';
?>