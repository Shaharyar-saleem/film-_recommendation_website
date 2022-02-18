<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Admin Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Expand, contract, animate forms with jQuery wihtout leaving the page" />
        <meta name="keywords" content="expand, form, css3, jquery, animate, width, height, adapt, unobtrusive javascript"/>
		<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="js/cufon-yui.js" type="text/javascript"></script>
		<script src="js/ChunkFive_400.font.js" type="text/javascript"></script>
		<script type="text/javascript">
			Cufon.replace('h1',{ textShadow: '1px 1px #fff'});
			Cufon.replace('h2',{ textShadow: '1px 1px #fff'});
			Cufon.replace('h3',{ textShadow: '1px 1px #000'});
			Cufon.replace('.back');
		</script>
    </head>
    <body>
    <div class="container">
        <div class="row mt-5">
            <div class="offset-4"></div>
            <div class="col-md-4 justify-content-center">
                <?php
                //Admin login attempt
                error_reporting(0);
                if ($_POST['adminAction'] == "adminLogIn"){
                    if (isset( $_POST['submit'])) {
                        $_admin_name = $_REQUEST['admin_name'];
                        $_admin_password = $_REQUEST['admin_password'];
                        $connection = pg_connect("host=localhost port=5432 dbname=Film_db user=postgres password=Pakistan@2k21");
                        $query = "select admin_login('$_admin_name', '$_admin_password')";
                        $result = pg_query($connection, $query);
                        if (pg_num_rows($result) != 0)
                        {
                            header('Location: http://localhost/FILM_WEBSITE/admin/Film.php');
                        }
                        else{
                            echo '<div class="alert alert-danger mt-3" role="alert">
                  User name OR Password is Wrong!
                   </div>';
                        }
                    }
                    else{
                        echo "there is an error";
                    }
                }
                ?>
                <div class="wrapper">
                    <h2 class="text-center">Admin Login</h2>
                    <div class="content">
                        <div id="form_wrapper" class="form_wrapper">
                            <form class="login active" action="" method="POST">
                                <h3>Login</h3>
                                <input type="hidden" name="adminAction" value="adminLogIn">
                                <div>
                                    <label for="username">Name:</label>
                                    <input type="text" name="admin_name" required>

                                </div>
                                <div>
                                    <label for="password">Password:</label>
                                    <input type="password" id="password" name="admin_password" required>
                                </div>
                                <div class="bottom">
                                    <input type="submit" value="submit" name="submit">
                                    <div class="clear"></div>
                                </div>
                            </form>

                        </div>
                    </div>
            </div>
        </div>
            <div class="offset-4"></div>
    </div>

		<!-- The JavaScript -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>

