<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- third party css -->
    <link href="../assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">
    <!-- third party css end -->

    <!-- App css -->
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="../assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <link href="../assets/css/DataStyle.css" rel="stylesheet" type="text/css">
</head>
<body>

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
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST">
            <input type="hidden" name="adminAction" value="editFilm">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Film</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Serial</label>
                        <input type="number" name="film_id" class="form-control" value='.$film_result[0].' readonly>
                        <label>Title</label>
                        <input type="text" name="film_title" class="form-control" value='.$film_result[1].'>

                        <label>Release Year</label>
                        <input type="number" name="release_year" class="form-control" value='.$film_result[2].'>

                        <label>Country</label>
                        <input type="text" name="production_country" class="form-control" value='.$film_result[3].'>

                        <label>Language</label>
                        <input type="text" name="film_language" class="form-control" value='.$film_result[4].'>

                        <label>Parent Id</label>
                        <input type="number" name="parent_id" class="form-control" value='.$film_result[5].'>

                        <label>Category</label>
                        <input type="number" name="category_id" class="form-control" value='.$film_result[6].'>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-info" value="submit" name="submit">
                </div>
            </form>
        </div>
    </div>
</div>';

    }
}

//edit Film
if($_POST['adminAction'] == "editFilm"){
    if (isset( $_POST['submit'])) {
        $_film_id = $_REQUEST['film_id'];
        $_film_title = $_REQUEST['film_title'];
        $_release_year = intval($_REQUEST['release_year']);
        $_production_country = $_REQUEST['production_country'];
        $_film_language = $_REQUEST['film_language'];
        $_parent_id = intval($_REQUEST['parent_id']);
        $_category_id = intval($_REQUEST['category_id']);
        $query = "select update_film($_film_id, '$_film_title',$_release_year,'$_production_country','$_film_language',$_parent_id,$_category_id)";
        $result = pg_query($connection, $query);
        if ($result)
        {
            echo "$_film_title film Updated Successfully";
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
</body>
</html>