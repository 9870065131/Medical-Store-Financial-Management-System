<?php 
 session_start(); 
include "include/db.php";

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $username = mysqli_real_escape_string($mysqli,$username);
        $password = mysqli_real_escape_string($mysqli,$password);

        $query = "SELECT * FROM user WHERE username = '$username'";
        $select_user_query = mysqli_query($mysqli,$query);
        if (!$select_user_query) {
            die("QUERY FAILED" . mysqli_error($mysqli));
        }
        while ($row = mysqli_fetch_array($select_user_query)) {

            $db_username = $row['username'];
            $db_user_password = $row['user_password'];
        }

        if ($username === $db_username && $password === $db_user_password) {
            $_SESSION['username'] = $db_username;
            header("Location: index.php");
        }else{
            header("Location: login.php");

        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.min.js"></script>

        <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.min.js"></script>

        <style>
            body {
                margin: 0;
                padding: 0;
                background-color: #007bff;
                height: 100vh;
            }
            
            #login .container #login-row #login-column #login-box {
                margin-top: 80px;
                max-width: 600px;
                height: 320px;
                border: 1px solid #9C9C9C;
                background-color: #EAEAEA;
            }
            
            #login .container #login-row #login-column #login-box #login-form {
                padding: 20px;
            }
            
            #login .container #login-row #login-column #login-box #login-form #register-link {
                margin-top: -85px;
            }
        </style>
    </head>

    <body>
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
                        <div id="login-box" class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <form id="login-form" class="form" action="" method="post" name="login">
                                <h3 class="text-center text-primary">Login</h3>
                                <div class="form-group">
                                    <label for="username" class="text-primary">Username:</label>
                                    <br>
                                    <input type="text" name="username" id="username" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="text-primary">Password:</label>
                                    <br>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <center>
                                        <input type="submit" name="submit" class="btn btn-primary btn-md" value="Submit">
                                    </center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>