<?php
    require('../config/database.php');

    $user_id = $_POST['userId'];
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $adress = trim($_POST['adress']);
    $m_number = trim($_POST['mnumber']);
    $ide_number = trim($_POST['idenumber']);
    $e_mail = trim($_POST['email']);
    $id_city_birthday = $_POST['id_city_birthday'];
    $id_city_document = $_POST['id_city_document'];

    $sql_get_user = "select * from users where id = $user_id";
    $result = pg_query($conn_local, $sql_get_user);

    if (pg_num_rows($result) > 0) {
        $query = "
            UPDATE users
            SET firstname = '$fname',
                lastname = '$lname',
                adress = '$adress',
                mobile_number = '$m_number',
                ide_number = '$ide_number',
                email = '$e_mail',
                id_city_birthday = '$id_city_birthday',
                id_city_document = '$id_city_document'
            WHERE id = '$user_id';
        ";
        $res = pg_query($conn_local, $query);
        if ($res) {
            echo "<script>alert('Success !!!')</script>";
            header('refresh:0;url=list_users.php');
        } else {
            echo "Something wrong!";
        }
    } else {
        echo "<script>alert('User does not exist !!!')</script>";
        header('refresh:0;url=list_users.php');
    }
?>