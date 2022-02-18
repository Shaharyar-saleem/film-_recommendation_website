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
                <a class="nav-link" href="http://localhost/FILM_WEBSITE/userDashboard.php" style="color: white;">Home</a>
            </li>
  
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/FILM_WEBSITE/userWatchedFilms.php/?id='.$user_id.'" style="color: white;">Watched Films</a>
            </li>
            <li class="ml-auto">
            <form action="" method="POST" style="position: absolute; right: 58px; top: 10px;">
                <input type="submit" name="logoutBtn" value="LOG OUT" class="btn btn-outline-primary btn-sm">
            </form>
            
</li>
            ';
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
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center"><i>Watched Films</i></h1>
        </div>
    </div>

    <table class="table table-striped table-hover mt-3">
        <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Year</th>
            <th>Country</th>
            <th>Language</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $connection = pg_connect("host=localhost port=5432 dbname=Film_db user=postgres password=Pakistan@2k21");
        $query = "select get_user_watched_films($user_id)";
        $result = pg_query($connection, $query);


        while ($row = pg_fetch_object($result)){
            $string = trim($row->get_user_watched_films, '()"');
            $film_result = explode(',', $string);
            echo '<tr>';
            echo '<td>';
            echo  $film_result[0];
            echo '</td>';
            echo '<td>';
            echo  $film_result[1];
            echo '</td>';
            echo '<td>';
            echo  $film_result[2];
            echo '</td>';
            echo '<td>';
            echo  $film_result[3];
            echo '</td>';
            echo '<td>';
            echo  $film_result[4];
            echo '</td>';
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>