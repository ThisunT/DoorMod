<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name = "viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Door</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-center">
                <li><a href="<?php echo (base_url("index.php/Home")) ?>">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo (base_url("index.php/Home/register")) ?>">Register</a></li>
                <li><a href="<?php echo (base_url("index.php/Login/LoginUser")) ?>">Login</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>