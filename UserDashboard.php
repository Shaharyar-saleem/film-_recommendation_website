<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php
session_start();
$user_id = $_SESSION['user'];
?>
<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php
            echo '
           <li class="nav-item active">
                <a class="nav-link" href="userDashboard.php" style="color: white;">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="userRatedFilms.php/?id='.$user_id.'" style="color: white;">Rated Films</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/FILM_WEBSITE/userWatchedFilms.php/?id='.$user_id.'" style="color: white;">Watched Films</a>
            </li>
             <li class="nav-item">
                <a class="nav-link" href="http://localhost/FILM_WEBSITE/allFilms.php" style="color: white;">All Films</a>
            </li>
             <li class="ml-auto">
            <form action="" method="POST" style="position: absolute; right: 58px; top: 10px;">
                <input type="submit" name="logoutBtn" value="LOG OUT" class="btn btn-outline-primary btn-sm">
            </form>
            
</li>';
            if (isset($_POST['logoutBtn'])) {
                echo 'HI LOGOUT IS PRESSED';
                session_start();
                unset($_SESSION['user']);
                header('Location: http://localhost/FILM_WEBSITE/UserLogin.php');
            }
            ?>
        </ul>
    </div>
</nav>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h2 class="text-center"><i>SUGGESTED FILMS</i></h2>
        </div>
    </div>
    <div class="row">
        <?php
        $connection = pg_connect("host=localhost port=5432 dbname=Film_db user=postgres password=Pakistan@2k21");
        $user_id = $_SESSION['user'];
        $query = "select get_user_film_suggestion($user_id)";
        $result = pg_query($connection, $query);

        $query_2 = "select check_rated_films($user_id)";
        $result_2 = pg_query($connection, $query_2);
        $returning_rows = pg_num_rows($result_2);
        echo '<br>';
        if ($returning_rows != 0){
            while ($row = pg_fetch_object($result)){
                $string = trim($row->get_user_film_suggestion, '()"');
                $film_result = explode(',', $string);
                echo '
                <div class="col-md-3">
                <div class="card mt-3" style="width: 22rem;">
                <a href="http://localhost/FILM_WEBSITE/filmDetail.php/?id='.$film_result[0].'">
                    <img class="card-img-top" src="./images/play_video.jpg" alt="Card image cap">
                </a>
                    <div class="card-body">
                    <table class="table table-striped">
  <tbody>
    <tr>
      <td><b>Film Title</b></td>
      <td>'.$film_result[1].'</td>
    </tr>
    <tr>
      <td><b>Release Year</b></td>
      <td>'.$film_result[2].'</td>
    </tr>
     <tr>
      <td><b>Country</b></td>
      <td>'.$film_result[3].'</td>
    </tr>
     <tr>
      <td><b>Language</b></td>
      <td>'.$film_result[4].'</td>
    </tr>
     <tr>
      <td><b>Category</b></td>
      <td>'.$film_result[6].'</td>
    </tr>
  </tbody>
</table>
                    </div>
                    </div>
                    </div>';
            }
        }
        else{
            echo '
            <div class="alert alert-info" role="alert" style="width: 50%; margin: 0 auto">
            There is no Suggested Film for this User
            </div>';
        }
        ?>
    </div>
</div>

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>