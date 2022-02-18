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
    $query = "select get_film_related_person($id)";
    $result = pg_query($connection, $query);
    error_reporting(0);
    $row = pg_fetch_object($result);
        $string = trim($row->get_film_related_person, '()');
        $film_person = explode(',', $string);
        echo '
<div>
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST">
            <input type="hidden" name="adminAction" value="editFilmRelatedPerson">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Film</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID</label>
                        <input type="number" name="film_related_id" class="form-control" value='.$film_person[0].' readonly>
                        <label>Name</label>
                         <select name="person_id" class="form-control" required>';
    $query_3 = "select get_all_related_person()";
    $result_3 = pg_query($connection, $query_3);
    while ($row = pg_fetch_object($result_3)){
        $string = trim($row->get_all_related_person, "()");
        $film_3 = explode(',', $string);
        echo '<option value="'.htmlspecialchars($film_3[0]).'">'.htmlspecialchars($film_3[1]).'</option>';
    }
    echo '
                             </select>';
echo '
                       <label>Film</label>
                        <select name="film_id" class="form-control" required>';

                            $query_2 = "select get_all_films()";
                            $result_2 = pg_query($connection, $query_2);
                             while ($row = pg_fetch_object($result_2)){
                                 $string = trim($row->get_all_films, "()");
                                  $film_2 = explode(',', $string);
                                 echo '<option value="'.htmlspecialchars($film_2[0]).'">'.htmlspecialchars($film_2[1]).'</option>';
                             }
                             echo '
                             </select>
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

//edit Film
if($_POST['adminAction'] == "editFilmRelatedPerson"){
    if (isset( $_POST['submit'])) {
        $_film_related_id = intval($_REQUEST['film_related_id']);
        $_person_id = intval($_REQUEST['person_id']);
        $_film_id = intval($_REQUEST['film_id']);

        $query = "select update_film_related_person($_film_related_id, $_person_id, $_film_id)";
        $result = pg_query($connection, $query);
        if ($result)
        {
            echo "Updated Successfully";
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