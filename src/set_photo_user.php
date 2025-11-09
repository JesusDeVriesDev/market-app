<?php
    //get database acces
    require('../config/database.php');

    //get form data
    $user_id = $_POST['userId'];
    $photo = trim($_POST['photoId']);

    $sql_get_user = "select * from users where id = $user_id";

    $result = pg_query($conn_local, $sql_get_user);
    if (pg_num_rows($result) > 0) {
        //update query
        $query = "
            UPDATE users
            SET photo = '$photo'
            WHERE id = '$user_id';
        ";
        //execute query
        $res = pg_query($conn_local, $query);
        //validate result
        if($res){
            header('refresh:0;url=main.php');
        } else {
            echo "Something wrong!";
        }
    } else {
        header('refresh:0;url=list_users.php');
    }
?>