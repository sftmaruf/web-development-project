<?php
require 'header.php';
require 'PHP/dbh.script.php';
require 'PHP/parentScript.script.php';

if (isset($_SESSION['userEmail'])) {

    $currentUserEmail = $_SESSION['userEmail'];
    $currentUser = isUserExist($conn, $currentUserEmail);
?>
    <section class="container pt-3">
        <h3><strong>Setting for <?php echo $currentUser['uName'] ?></strong></h3>
        <div class="d-flex flex-column align-items-center">
            <div class="white-form-background mb-3">
                <h5><strong>User</strong></h5>
                <div class="form-group">
                    <label for="editUserName">Name</label>
                    <input name="editUserName" type="text" class="form-control" id="editUserName" placeholder="Antu Saha">
                </div>
            </div>

            <div class="white-form-background mb-3">
                <button onclick="editProfileInfo(<?php echo $currentUser['uid']; ?>)" name="submit" type="submit" class="btn btn-dark w-100">Submit Profile Information</button>
            </div>

            <div class="white-form-background mb-3">
                <h5><strong>Set new password</strong></h5>
                <div class="form-group">
                    <label for="editUserPassword">Password</label>
                    <input name="editUserPassword" type="password" class="form-control" id="editUserPassword">
                </div>
                <div class="form-group">
                    <label for="editUserPasswordConfirm">Confirm new password</label>
                    <input name="editUserPasswordConfirm" type="password" class="form-control" id="editUserPasswordConfirm">
                </div>
                <button onclick="editPassword(<?php echo $currentUser['uid']; ?>)" name="submit" type="submit" class="btn btn-dark">Set new password</button>
            </div>
        </div>
    </section>

    <script>
        function editProfileInfo(userID) {
            const userNewName = document.getElementById('editUserName').value;
            prepareAjax(userNewName, userID, 'userNewName', 'editProfile');
        }

        function editPassword(userID) {
            const newPassword = document.getElementById('editUserPassword').value;
            const newConfirmPassword = document.getElementById('editUserPasswordConfirm').value;

            if (newPassword === newConfirmPassword) {
                prepareAjax(newConfirmPassword, userID, 'userNewPassword', 'editPassword');
            } else {
                console.log('unmatched');
                alert('password isn\'t matched');
            }
        }

        function prepareAjax(userInput, userID, parameterLabel, condition) {
            $.ajax({
                url: 'PHP/editProfileAjaxHandler.script.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    [parameterLabel]: userInput,
                    userID: userID,
                    condition: condition
                },
                success: (response) => {
                    if (response === 'pwdChanged') {
                        prepareAjaxForLogout();
                        alert('your password is updated');
                    }else{
                        alert('your name is updated');
                    }
                }
            })
        }

        function prepareAjaxForLogout() {
            $.ajax({
                url: 'PHP/logout.script.php',
                success: (response) => {
                    window.location.assign("http://localhost/Project/login.php");
                }
            });
        }
    </script>
<?php
    require 'footer.php';
} else {
    header('location: http://localhost/Project/login.php');
}
