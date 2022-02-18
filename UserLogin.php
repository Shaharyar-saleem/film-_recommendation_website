<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Animated Form Switching with jQuery</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Expand, contract, animate forms with jQuery wihtout leaving the page" />
        <meta name="keywords" content="expand, form, css3, jquery, animate, width, height, adapt, unobtrusive javascript"/>
		<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
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
    <center>
		<div class="wrapper"  style="margin-top: 130px;">
			<h1>User Login</h1>
			<div class="content">
				<div id="form_wrapper" class="form_wrapper">
					<form class="register">
						<h3>Register</h3>
						<div class="column">
							<div>
								<label>Username:</label>
								<input type="text" required/>

							</div>

							<div>
								<label>Password:</label>
								<input type="password" required />

							</div>
						</div>
						<div class="column">
							<div>
								<label>Email:</label>
								<input type="text" required />

							</div>


							<div>
								<label> Repeat Password:</label>
								<input type="password" required/>

							</div>
						</br>
						</div>

						<div class="bottom">
							<div class="remember">
								<input type="checkbox" />
								<span>Send me updates</span>
							</div>
							<input type="submit" value="Register" />
							<a href="index.php" rel="login" class="linkform">You have an account already? Log in here</a>
							<div class="clear"></div>
						</div>
					</form>
					<form class="login active" action="" method="POST">
                        <input type="hidden" name="userAction" value="userLogIn">
						<h3>Login</h3>
						<div>
							<label>User Email:</label>
							<input type="text" name="user_email" required/>

						</div>
						<div>
							<label>Password:</label>
							<input type="password" name="user_password" required/>

						</div>
						<div class="bottom">
							<input type="submit" value="Login" name="submit"></input>
							<p>You don't have an account yet?
                                <span>
                                <a href="UserRegistration.html" rel="register" class="linkform"> Register here</a>
                                </span>
                            </p>
							<div class="clear"></div>
						</div>
					</form>
					<form class="forgot_password">
						<div class="bottom">
							<input type="submit" value="Send reminder"></input>
							<a href="UserLogin.html" rel="login" class="linkform">Suddenly remebered? Log in here</a>
							<a href="UserRegistration.html" rel="register" class="linkform">You don't have an account? Register here</a>
							<div class="clear"></div>
						</div>
					</form>
				</div>
				<div class="clear"></div>
			</div>
			<a class="back" href="index.php">Home</a>
		</div>
    </center>
		

		<!-- The JavaScript -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    </body>
</html>

<?php
//user login attempt
error_reporting(0);
if ($_POST['userAction'] == "userLogIn"){
    if (isset( $_POST['submit'])) {
        $_user_email = $_REQUEST['user_email'];
        $_user_password = $_REQUEST['user_password'];
        $connection = pg_connect("host=localhost port=5432 dbname=Film_db user=postgres password=Pakistan@2k21");
        $query = "select user_login('$_user_email', '$_user_password')";
        $result = pg_query($connection, $query);
        $result_row = pg_fetch_object($result);
        $string = trim($result_row->user_login, '()"');
        $user_result = explode(',', $string);
        if (pg_num_rows($result) != 0)
        {
            session_start();
            $_SESSION['user'] = $user_result[0];
            header('Location: http://localhost/FILM_WEBSITE/UserDashboard.php');
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