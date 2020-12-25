<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emboss</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="stylesheet/main.css">
    <link rel="stylesheet" href="stylesheet/login.css">
    <link rel="stylesheet" href="stylesheet/profile.css">
    <link rel="stylesheet" href="stylesheet/writepost.css">
    <link rel="stylesheet" href="stylesheet/postComponentOnMainPage.css">
</head>

<body>
    <header>
        <nav class="navbar top-navbar navbar-expand-lg navbar-light bg-light">
            <div class="container pt-2 pb-2">
                <a class="navbar-brand" href="main.php"><strong>E M B O S S</strong></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-top" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-top">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    </form>

                    <?php if (!isset($_SESSION['userEmail'])) { ?>
                        <div id="guest-buttons-container" class="hover-effect navbar-nav ml-auto">
                            <form id="login-button-navbar" method="POST" action="login.php">
                                <input type="submit" name="isLogIn" class="btn btn-light text-dark nav-link text-primary mr-2" value="logIn" />
                            </form>
                            <form id="signup-button-navbar" method="POST" action="signup.php">
                                <input type="submit" name="isLogIn" class="btn btn-primary" value="Create account" />
                            </form>
                        </div>

                    <?php } else { ?>
                        <div id="loggedin-buttons-container" class="hover-effect navbar-nav ml-auto">
                            <?php if (!(strtok($_SERVER["REQUEST_URI"], '?') === '/Project/profile.php')) { ?>
                                <form method="POST" action="profile.php">
                                    <input id="profile-button" type="submit" name="isProfile" class="btn btn-dark" value="Profile" />
                                </form>
                            <?php } else { ?>
                                <form method="POST" action="writepost.php">
                                    <input id="writepost-button" type="submit" name="isProfile" class="btn btn-dark" value="Write Post" />
                                </form>
                            <?php } ?>

                            <form method="POST" action="PHP/logout.script.php">
                                <input id="logout-button" type="submit" name="isLogOut" class="btn btn-dark ml-2" value="Logout" />
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </nav>
    </header>