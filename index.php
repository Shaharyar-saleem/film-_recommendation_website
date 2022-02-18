<?php
//  $connection = pg_connect("host=localhost port=5432 dbname=Film_db user=postgres password=Pakistan@2k21");
//$query = "select get_all_users()";
//  $result = pg_query($connection, $query);
//      while($row = pg_fetch_object($result)){
//          echo $row;
//          echo "<br>";
//      }
//      pg_close($connection);
//?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>FILM WORLD</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Expand, contract, animate forms with jQuery wihtout leaving the page" />
        <meta name="keywords" content="expand, form, css3, jquery, animate, width, height, adapt, unobtrusive javascript"/>
		<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="js/cufon-yui.js" type="text/javascript"></script>
		<script src="js/ChunkFive_400.font.js" type="text/javascript"></script>
    </head>
    <body>
    <section>
        <div class="container">
            <div class="row mt-5">
                <div class="offset-3"></div>
                <div class="col-md-6 mt-5">
                    <div class="wrapper mx-auto">
                        <h1>Welcome To Film World.</h1>
                        <h2>click the Admin or User  for Login.</h2>
                        <a href="admin/AdminLogin.php" id="button">Admin</a>
                        <a href="UserLogin.php" id="button">User</a>
                        <a class="back btn btn-success" href="UserRegistration.html">User registration</a>
                        <br>
                        <br>
                        <div>
                            <h2>For user registration <a href="UserRegistration.html"><span>Cilck Here.</a></h2>
                        </div>
                    </div>
                </div>
                <div class="offset-3"></div>
            </div>
        </div>
    </section>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>