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
                <li><a href="" data-toggle="modal" data-target="#addpost">Add Post</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo (base_url("index.php/Home/profile")) ?>"><?php echo $this->session->userdata('userdata')['dp']; ?></a></li>
                <li><a href="<?php echo (base_url("index.php/Home/messages")) ?>"><span class="glyphicon glyphicon-envelope"></span></a></li>
                <li><a href="<?php echo (base_url("#")) ?>"><span class="glyphicon glyphicon-bell"></span></a></li>
                <li><a href="<?php echo (base_url("index.php/Login/LogoutUser")) ?>">Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<script>
    function initialize() {

        var input = document.getElementById('location');
        var autocomplete = new google.maps.places.Autocomplete(input);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div class="modal fade" id="addpost" tabindex="-1" role="dialog" aria-labelledby="addpost" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Make a new post</h4>
            </div>
            <form id=post_form action="<?php echo (base_url("index.php/PostController/addPost")) ?>" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <input class="form-control " type="text" id="title" placeholder="Title" name="title" >
                    <span class="error_form" id="title_error_message"></span>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" id="location" placeholder="Location" name="location">
                    <span class="error_form" id="location_error_message"></span>
                </div>
                <div class="form-group">
                    <select class="form-control" name="category" size="small" id="category">
                        <option value="category">Select Category</option>
                        <option value="financial">Financial</option>
                        <option value="medical">Medical</option>
                        <option value="social">Social</option>
                        <option value="educational">Educational</option>
                        <option value="food">Food & Beverages</option>
                        <option value="other">Other</option>
                    </select>
                    <span class="error_form" id="category_error_message"></span>
                </div>
                <div class="form-group">
                    <input class="form-control " type="number" id="quantity" placeholder="Quantity" name="quantity">
                </div>
                <div class="form-group">
                    <input class="form-control " type="number" id="mobilenumber" placeholder="Mobile Number" name="mobilenumber" max="999999999">
                    <span class="error_form" id="number_error_message"></span>
                </div>
                <div class="form-group">
                    <input class="form-control " type="text" id="description" placeholder="Description" name="description">
                    <span class="error_form" id="description_error_message"></span>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="submit" id="post" class="btn btn-warning btn-lg" style="width: 100%;" disabled="disabled"><span class="glyphicon glyphicon-ok-sign"></span>Post</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(function() {
        $("#title_error_message").hide();
        $("#location_error_message").hide();
        $("#category_error_message").hide();
        $("#description_error_message").hide();
        $("#number_error_message").hide();

        var error_title = true;
        //var error_location = false;
        var error_category = true;
        var error_description = true;
        var error_number = false;

        $("#title").focusout(function() {
            check_title();
        });

        $("#location").focusout(function() {
            //check_location();
        });

        $("#category").focusout(function() {
            check_category();
        });



        $("#description").focusout(function() {
            check_description();
        });

        $("#mobilenumber").focusout(function() {
            check_mobileNumber();
        });

        function check_title() {

            var title_length = $("#title").val().length;

            if(title_length < 5 || title_length > 30) {
                $("#title_error_message").html("Should be between 5-20 characters");
                $("#title_error_message").show();
                error_title = true;
                document.getElementById("post").disabled = true;
            } else {
                $("#title_error_message").hide();
                error_title = false;
                if(error_title == false && error_category == false && error_number == false && error_description == false) {
                    $('#post').removeAttr('disabled');
                } else {
                    return false;
                }
            }

        }

        /*function check_location() {

            var location_length = $("#form_password").val().length;

            if(password_length < 8) {
                $("#password_error_message").html("At least 8 characters");
                $("#password_error_message").show();
                error_password = true;
            } else {
                $("#password_error_message").hide();
            }

        }*/
        
        function validate_category() {
            var ddl = document.getElementById("category");
            var selectedValue = ddl.options[ddl.selectedIndex].value;
            if (selectedValue == "category")
            {
                $("#category_error_message").html("Please select a category");
                $("#category_error_message").show();
                error_category=true;
                document.getElementById("post").disabled = true;
            }else {
                $("#category_error_message").hide();
                error_category=false;
                if(error_title == false && error_category == false && error_number == false && error_description == false) {
                    $('#post').removeAttr('disabled');
                } else {
                    return false;
                }
            }
        }
        
        function check_category() {

            validate_category();

        }


        function check_mobileNumber() {
            var num_lenght=$("#mobilenumber").val().length;
            var num = document.getElementById("mobilenumber");

            if(num_lenght == 0){
                $("#number_error_message").hide();
                error_number=false;
                if(error_title == false && error_category == false && error_number == false && error_description == false) {
                    $('#post').removeAttr('disabled');
                } else {
                    return false;
                }
            }
            if(num_lenght != 10){
                $("#number_error_message").html("Enter a valid mobile number");
                $("#number_error_message").show();
                error_number=true;
                document.getElementById("post").disabled = true;
            }
            else if(($("#description").val().length > 0) || ($("#description").val().length == 0)){
                $("#number_error_message").hide();
                error_number=false;
                error_description = false;
                if(error_title == false && error_category == false && error_number == false && error_description == false) {
                    $('#post').removeAttr('disabled');
                } else {
                    return false;
                }
            }
        }

        function check_description() {
            var des_lenght=$("#description").val().length;
            var num_lenght=$("#mobilenumber").val().length;

            if((des_lenght == 0) && (num_lenght == 0)){
                $("#description_error_message").html("Fill either this or mobile number");
                $("#description_error_message").show();
                error_description=true;
                document.getElementById("post").disabled = true;
            }
            else {
                $("#description_error_message").hide();
                $("#number_error_message").hide();
                error_description=false;
                error_number=false;
                if(error_title == false && error_category == false && error_number == false && error_description == false) {
                    $('#post').removeAttr('disabled');
                } else {
                    return false;
                }
            }
        }

        //subBtn();


        
        $("#post_form").submit(function() {

            var error_title = false;
            //var error_location = false;
            var error_category = false;
            var error_description = false;
            var error_number = false;

            check_title();
            check_category();
            check_mobileNumber();
            check_description();

            if(error_title == false && error_category == false && error_number == false && error_description == false) {
                return true;
            } else {
                return false;
            }

        });

    });
</script>
<!--AIzaSyA_PGeECTXC2iKh10u6Rq5pwiXbk9VMPk0-->