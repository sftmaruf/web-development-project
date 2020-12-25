<?php
require "header.php";
require "PHP/dbh.script.php";
require 'PHP/parentScript.script.php';

$colors = array('#E1704E', '#24A9F0', '#2BCADA', '#A9F5B8', '#20D67E');
$randomColor = rand(0, count($colors) - 1);

if ($loggdUserInfoFromDB = isUserExist($conn, $_SESSION['userEmail'])) {
?>
    <main class="profile-container">
        <div class="black-colored-background">
            <div style="background-color: <?php echo $colors[$randomColor] ?>;" class="profile-picture">
                <h1>SM</h1>
            </div>
        </div>

        <section class="pl-2 pr-3 h-auto">
            <div class="profile-details row">
                <div class="col-md-3 col-sm-0"></div>
                <div class="col-md-6 col-sm-6 user-bio">
                    <h4 class="user-name"><?php echo $loggdUserInfoFromDB['uName'] ?></h4>
                    <p>404 bio not found</p>
                    <p>Joined on Dec 6, 2020</p>
                </div>
                <div class="col-md-3 col-sm-5 profiledit-button-container">
                    <a href="editProfile.php" id="profile-edit-button" class="btn btn-primary ml-auto">Edit profile</a>
                </div>
                <div id="profilemoreinfo-collapse-button" class="w-100 d-flex flex-column justify-content-end">
                    <button onclick="MechanismOfCollapsingProfileMoreInfo()" class="btn-sm btn-outline-secondary btn-block">More info about @antu</button>
                </div>
            </div>
        </section>

        <section id="profile-more-info">
            <div>
                <p>0 posts published</p>
                <p>0 comments written </p>
                <p>5 tags followed </p>
            </div>
        </section>
    </main>

    <script>
        nameShortingForProfilePic();
        
        function MechanismOfCollapsingProfileMoreInfo() {
            document.getElementById('profile-more-info').children[0].style.display = 'block';
        }

        function nameShortingForProfilePic() {
            const userName = '<?php echo $loggdUserInfoFromDB['uName']; ?>';
            const splittedUserNameArray = userName.split(' ');
            let shortNameAsPic;

            if (splittedUserNameArray.length < 2) {
                shortNameAsPic = splittedUserNameArray[0].charAt(0);
            } else {
                shortNameAsPic =
                    splittedUserNameArray[0].charAt(0) +
                    splittedUserNameArray[1].charAt(0);
            }

            document.getElementsByClassName('profile-picture')[0]
                .children[0].innerText = shortNameAsPic;
        }
    </script>

<?php
} else {
    header("location: Location: http://localhost/Project/login.php?invaliduser");
    exit();
}

require "footer.php";
?>