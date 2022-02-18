<?php
$connection = pg_connect("host=localhost port=5432 dbname=Film_db user=postgres password=Pakistan@2k21");

//Add Film
if($_POST['adminAction'] == "addFilm"){
    if (isset( $_POST['submit'])) {
        $_film_title = $_REQUEST['film_title'];
        $_release_year = intval($_REQUEST['release_year']);
        $_production_country = $_REQUEST['production_country'];
        $_film_language = $_REQUEST['film_language'];
        $_parent_id = intval($_REQUEST['parent_id']);
        $_category_id = intval($_REQUEST['category_id']);
        $query = "select insert_into_film('$_film_title',$_release_year,'$_production_country','$_film_language',$_parent_id,$_category_id)";
        $result = pg_query($connection, $query);
        if ($result)
        {
            echo "Congratulations! $_film_title film added Successfully";
        }
        else{
            echo "Something wrong";
        }
        }
    else{
        echo "there is an error";
    }
}

//delete Film
if($_POST['adminAction'] == "deleteFilm"){
        $_film_id = intval($_REQUEST['film_id']);
        $query = "select delete_film($_film_id)";
        $result = pg_query($connection, $query);
        if ($result)
        {
            echo "Film Deleted Successfully";
        }
        else{
            echo "Something wrong";
        }
}

//Add Related Person
if($_POST['adminAction'] == "addPerson"){
    if (isset( $_POST['submit'])) {
        $_person_name = $_REQUEST['person_name'];
        $_sex = $_REQUEST['person_sex'];
        $_role_id = intval($_REQUEST['role_id']);
        $query = "select insert_related_person('$_person_name','$_sex',$_role_id)";
        $result = pg_query($connection, $query);
        if ($result)
        {
            echo "Congratulations! $_person_name added Successfully";
        }
        else{
            echo "Something wrong";
        }
    }
    else{
        echo "there is an error";
    }
}

//delete related Person
if($_POST['adminAction'] == "deletePerson"){
    if (isset($_POST['submit'])) {
        $_person_id = $_REQUEST['person_id'];
        $query = "select delete_related_person($_person_id)";
        $result = pg_query($connection, $query);
        if ($result)
        {
            echo "Person Deleted Successfully";
        }
        else{
            echo "Something wrong";
        }
    }
    else{
        echo "there is an error";
    }
}

//Add film related person
if($_POST['adminAction'] == "addFilmRelatedPerson"){
    if (isset( $_POST['submit'])) {
        $_person_id = intval($_REQUEST['person_id']);
        $_film_id = intval($_REQUEST['film_id']);

        $query = "select insert_film_related_person($_person_id, $_film_id)";
        $result = pg_query($connection, $query);
        if ($result)
        {
            echo "Congratulations! Film Related to Person Successfully.";
        }
        else{
            echo "Something wrong";
        }
    }
    else{
        echo "there is an error";
    }
}

//delete film related Person
if($_POST['adminAction'] == "deleteFilmRelatedPerson"){
    if (isset($_POST['submit'])) {
        $_person_id = $_REQUEST['person_id'];
        $query = "select delete_film_related_person($_person_id)";
        $result = pg_query($connection, $query);
        if ($result)
        {
            echo "Film related Person Deleted Successfully";
        }
        else{
            echo "Something wrong";
        }
    }
    else{
        echo "there is an error";
    }
}

//delete film categories
if($_POST['adminAction'] == "deleteFilmCategory"){
    if (isset($_POST['submit'])) {
        $_category_id = $_REQUEST['category_id'];
        $query = "select delete_film_category($_category_id)";
        $result = pg_query($connection, $query);
        if ($result)
        {
            echo "Film Category Deleted Successfully";
        }
        else{
            echo "Something wrong";
        }
    }
    else{
        echo "there is an error";
    }
}

//delete person role
if($_POST['adminAction'] == "deletePersonRole"){
    if (isset($_POST['submit'])) {
        $_role_id = $_REQUEST['role_id'];
        $query = "select delete_person_role($_role_id)";
        $result = pg_query($connection, $query);
        if ($result)
        {
            echo "Person Role Deleted Successfully";
        }
        else{
            echo "Something wrong";
        }
    }
    else{
        echo "there is an error";
    }
}

//delete film user
if($_POST['adminAction'] == "deleteFilmUser"){
    if (isset($_POST['submit'])) {
        $_user_id = $_REQUEST['user_id'];
        $query = "select delete_film_user($_user_id)";
        $result = pg_query($connection, $query);
        if ($result)
        {
            echo "User Deleted Successfully";
        }
        else{
            echo "Something wrong";
        }
    }
    else{
        echo "there is an error";
    }
}

//insert film category
if($_POST['adminAction'] == "addFilmCategory"){
    if (isset($_POST['submit'])) {
        $_category_name = $_REQUEST['category_name'];
        $query = "select insert_into_category('$_category_name')";
        $result = pg_query($connection, $query);
        if ($result)
        {
            echo "Film Category $_category_name Added Successfully";
        }
        else{
            echo "Something wrong";
        }
    }
    else{
        echo "there is an error";
    }
}

//insert person role
if($_POST['adminAction'] == "addPersonRole"){
    if (isset($_POST['submit'])) {
        $_role_name = $_REQUEST['role_name'];
        $query = "select insert_person_role('$_role_name')";
        $result = pg_query($connection, $query);
        if ($result)
        {
            echo "Film Peron Role $_role_name Added Successfully";
        }
        else{
            echo "Something wrong";
        }
    }
    else{
        echo "there is an error";
    }
}

?>