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
    <style>
        .custom_container{
            width: 85%;
            margin: 0 auto;
        }
        .rate {
            float: left;
            height: 30px;
        }
        .rate:not(:checked) > input {
            position:absolute;
            top:-9999px;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:25px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }
    </style>
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
            <li class="nav-item active">
                <a class="nav-link" href="userRatedFilms.php/?id='.$user_id.'" style="color: white;">Rated Films</a>
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
<div class=container">
    <div class="row my-5">
        <div class="col-md-12">
            <h1 class="text-center bg-light pt-5">All Rated Films</h1>
        </div>
    </div>
    <div class="row">
        <?php
        $connection = pg_connect("host=localhost port=5432 dbname=Film_db user=postgres password=Pakistan@2k21");
        $query = "select get_user_ratings($user_id)";
        $result = pg_query($connection, $query);


        while ($row = pg_fetch_object($result)){
            $string = trim($row->get_user_ratings, '()"');
            $film_result = explode(',', $string);

            $query_2 = "select get_user_given_ratings($user_id, $film_result[0])";
            $result_2 = pg_query($connection, $query_2);
            $row_2 = pg_fetch_object($result_2);
            $string_2 = trim($row_2->get_user_given_ratings, '()"');
            $user_rating = explode(',', $string_2);
            echo '
                <div class="col-md-3">
                <div class="card mt-3" style="width: 22rem;">
                <a href="http://localhost/FILM_WEBSITE/filmDetail.php/?id='.$film_result[0].'">
                    <img class="card-img-top" src="./images/play_video.jpg" alt="">
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
    <tr>
      <td><b>Given Rating</b></td>
      <td>'.$user_rating[1].' out of 5</td>
    </tr>
      <tr>
      <td><b>Edit Rating</b></td>
      <td>
       <form action="" method="POST">
       <input type="hidden" name="userAction" value="editRating">
       <input type="hidden" name="rating_id" value="'.$user_rating[0].'">
       <input type="hidden" name="user_id" value="'.$user_rating[2].'">
       <input type="hidden" name="film_id" value="'.$user_rating[3].'">
       <input type="number" max="5" min="1" name="rating_value">
  <input type="submit" name="submit" value="Edit Review" class="btn btn-sm btn-outline-primary mt-3" style="display: grid">
  </form>
      </td>
    </tr>
    <tr>
    <td><b>Delete Rating</b></td>
     <td class="d-flex">
      <form action="" method="POST">
      <input type="hidden" name="userAction" value="deleteRating">
      <input type="hidden" name="rating_id" value="'.$user_rating[0].'">
      <input type="submit" name="submit" value="Delete" class="btn btn-sm btn-outline-danger">
      </form>
      </td>
</tr>
  </tbody>
</table>
                    </div>
                    </div>
                    </div>
                    ';
        }
        ?>
    </div>
</div>

<?php
error_reporting(0);
if ($_POST['userAction'] == 'deleteRating'){
    if (isset( $_POST['submit'])){
        $_rating_id = $_POST['rating_id'];
        $connection = pg_connect("host=localhost port=5432 dbname=Film_db user=postgres password=Pakistan@2k21");
        echo "this is the rating_id: $_rating_id";
        $query_3 = "select delete_user_rating($_rating_id)";
        $result_3 = pg_query($connection, $query_3);
        if ($result_3){
            echo '
        <div class="alert alert-success" role="alert">
            Film Rating Delete Successfully;
       </div>';
            header("Refresh:0");
        }

    }
}

if ($_POST['userAction'] == 'editRating'){
    $_rating_id = intval($_POST['rating_id']);
    $_user_id = intval($_POST['user_id']);
    $_film_id = intval($_POST['film_id']);
    $_rating_value = intval($_POST['rating_value']);
    $connection = pg_connect("host=localhost port=5432 dbname=Film_db user=postgres password=Pakistan@2k21");
    $query_4 = "select update_user_rating($_rating_id, $_rating_value, $_user_id, $_film_id)";
    $result_4 = pg_query($connection, $query_4);
    if ($result_4){
        echo '
        <div class="alert alert-success mt-3" role="alert">
            Film Rating Edited Successfully;
       </div>';
    }
}

?>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>