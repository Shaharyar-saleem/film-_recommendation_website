<?php
$connection = pg_connect("host=localhost port=5432 dbname=Film_db user=postgres password=Pakistan@2k21");
if ( isset( $_POST['submit'] ) ) {
    $_user_name = $_REQUEST['user_name'];
    $_user_email = $_REQUEST['user_email'];
    $_user_password = $_REQUEST['user_password'];
    $_user_password_2 = $_REQUEST['user_password_2'];
    if ($_user_password !== $_user_password_2){
//        header("Location: http://localhost/FILM_WEBSITE/UserRegistration.html");
        echo '<script>alert("Password not same")</script>';
    }
    else{
        $query = "select insert_into_user('$_user_name', '$_user_email', '$_user_password')";
        $result = pg_query($connection, $query);
        if ($result)
        {
            echo "Congratulations! $_user_name Your are Registered Successfully";
        }
        else{
            echo "Something wrong";
        }
    }
}
else{
    echo "there is an error";
}
?>

