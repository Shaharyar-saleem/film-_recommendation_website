<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">

    <style>
        .custom_container{
            width: 85%;
            margin: 0 auto;
        }
        .rate {
            float: left;
            height: 58px;
            padding-top: 5px;
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
            font-size:48px;
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
echo $user_id;
?>
<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php
            echo '
           <li class="nav-item active">
                <a class="nav-link" href="http://localhost/FILM_WEBSITE/userDashboard.php" style="color: white;">Home</a>
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
    <div class="row my-5">
        <div class="col-md-12">
            <h1 class="text-center mt-5"><i>Film Detail</i></h1>
            <?php
            if (isset($_POST['logoutBtn'])){
                echo 'HI LOGOUT IS PRESSED';
                session_start();
                unset($_SESSION['user']);
                header('Location: http://localhost/FILM_WEBSITE/UserLogin.php');
            }
            ?>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-6">
            <?php
            if (isset($_GET['id'])){
                $id = $_GET['id'];
                $connection = pg_connect("host=localhost port=5432 dbname=Film_db user=postgres password=Pakistan@2k21");
                $query = "select get_films($id)";
                $result = pg_query($connection, $query);
                error_reporting(0);
                while ($row = pg_fetch_object($result)){
                    $string = trim($row->get_films, '()');
                    $film_result = explode(',', $string);
                    echo '
                <div>
                <table class="table table-striped">
  <tbody>
    <tr>
      <td><b>Film Name:</b></td>
      <td>'.$film_result[1].'</td>
    </tr>
    <tr>
      <td><b>Release Year:</b></td>
      <td>'.$film_result[2].'</td>
    </tr>
    <tr>
      <td><b>Film Country:</b></td>
      <td>'.$film_result[3].'</td>
    </tr>
     <tr>
      <td><b>Film Language:</b></td>
      <td>'.$film_result[4].'</td>
    </tr>
     <tr>
      <td><b>Film Category:</b></td>
      <td>'.$film_result[6].'</td>
    </tr>
  </tbody>
</table>
                </div>
        </div>
        <div class="col-md-6">
            <form action="" method="POST" style="display: grid">
                <input type="hidden" name="filmAction" value="watch">
                <input type="hidden" name="film_id" value='.$film_result[0].'>
                <input type="submit" name="submit" value="Watch Movie" class="btn btn-success btn-lg">
            </form>
            <h3 class="pt-4"><i>Your Valuable Review</i></h3>
            <form action="" method="POST">
            <input type="hidden" name="filmAction" value="filmRating">
            <input type="hidden" name="film_id" value='.$film_result[0].'>
             <div class="rate">
    <input type="radio" id="star5" name="rate" value="5" />
    <label for="star5" title="text">5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" />
    <label for="star4" title="text">4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" />
    <label for="star3" title="text">3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" />
    <label for="star2" title="text">2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" />
    <label for="star1" title="text">1 star</label>
  </div><br>
  <input type="submit" name="submit" value="Submit Review" class="btn btn-lg btn-outline-primary" style="display: grid">
  </form>
        </div>
    </div>

</div>';
                }
            }
            ?>
</body>
</html>

<?php
//watch film
if($_POST['filmAction'] == "watch"){
    if (isset( $_POST['submit'])) {
        session_start();
        $_user_id = $_SESSION['user'];;
        $_film_id = $_REQUEST['film_id'];
        $connection = pg_connect("host=localhost port=5432 dbname=Film_db user=postgres password=Pakistan@2k21");
        $query = "select insert_watched_film($_user_id, $_film_id)";
        $result = pg_query($connection, $query);
        if ($result)
        {
            echo '
<div class="row">
<div class="offset-2"></div>
<div class="col-md-8">
    <div class="alert alert-success" role="alert">
        Film Watched Successfully
    </div>
</div>
<div class="offset-2"></div>
</div>';
        }
        else{
            echo "Something wrong";
        }
    }
    else{
        echo "there is an error";
    }
}
else{
    echo '<br>';
}

//review film Film
    if($_POST['filmAction'] == "filmRating"){
        if (isset( $_POST['submit'])) {
            session_start();
            $_user_id = $_SESSION['user'];;
            $_film_id = $_REQUEST['film_id'];
            $_rating_value = $_REQUEST['rate'];
            $connection = pg_connect("host=localhost port=5432 dbname=Film_db user=postgres password=Pakistan@2k21");
            $query = "select insert_user_rating($_rating_value, $_user_id, $_film_id)";
            $result = pg_query($connection, $query);
            if ($result)
            {
                echo '
<div class="row">
<div class="offset-2"></div>
<div class="col-md-8">
    <div class="alert alert-success" role="alert">
        Review Posted Successfully
    </div>
</div>
<div class="offset-2"></div>
</div>';
            }
            else{
                echo "Something wrong";
            }
        }
        else{
            echo "there is an error";
        }
    }
    else{
        echo '<br>';
    }
?>

<div class="custom_container">
    <div class="row">
        <?php
        $connection = pg_connect("host=localhost port=5432 dbname=Film_db user=postgres password=Pakistan@2k21");
        session_start();
        $user_id = $_SESSION['user'];
        $film_id = $_GET['id'];
        $query_2 = "select get_films($film_id)";
        $result_2 = pg_query($connection, $query_2);
        $row_2 = pg_fetch_object($result_2);
        $string = trim($row_2->get_films, '()"');
        $film_result = explode(',', $string);
        if ($film_result[5] > 0){
            $film_id = $film_result[5];
        }

        $query = "select get_suggested_series($film_id, $user_id)";
        $result = pg_query($connection, $query);
        if ($result > 0){
            echo ' <div class="row">
        <div class="col-md-12">
            <h2 class="text-center"><i>YOU MAY WATCH THIS</i></h2>
        </div>
    </div>';
        }
        while ($row = pg_fetch_object($result)){
            $string = trim($row->get_suggested_series, '()"');
            $film_result = explode(',', $string);
            echo '
                <div class="col-md-3">
                <div class="card mt-3" style="width: 22rem;">
                <a href="http://localhost/FILM_WEBSITE/filmDetail.php/?id='.$film_result[0].'">
                    <img class="card-img-top" src="./images/play_video.jpg">
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
        ?>
    </div>
</div>
