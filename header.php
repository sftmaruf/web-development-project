<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="stylesheet/main.css">
    <link rel="stylesheet" href="stylesheet/login.css">
</head>

<body>
    <header>
        <nav class="navbar top-navbar navbar-expand-lg navbar-light bg-light">
            <div class="container pt-2 pb-2">
                <a class="navbar-brand" href="main.php">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    </form>

                    <div id="login-buttons" class="hover-effect navbar-nav ml-auto">
                        <form method="POST" action="login.php">
                            <input type="submit" name="isLogIn" class="btn btn-light text-dark nav-link text-primary mr-2" value="logIn"/>
                        </form>
                        <form method="POST" action="login.php">
                             <input type="submit" name="isLogIn" class="btn btn-primary" value="Create account"/>
                        </form>
                    </div>
                    <!-- <div class="hover-effect navbar-nav ml-auto">
                        <a class="nav-link text-primary mr-2" href="login.php?login=true">Login</a>
                        <a type="button" class="btn btn-primary" href="login.php?login=false">Create account</a>
                    </div> -->
                </div>
            </div>
        </nav>
    </header>