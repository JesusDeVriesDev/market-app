<?php
    //get database acces
    require('../config/database.php');
    //get form data
    $f_name = $_POST['fname'];
    $l_name = $_POST['lname'];
    $m_number = $_POST['mnumber'];
    $id_number = $_POST['idnumber'];
    $e_mail = $_POST['email'];
    $p_wd = $_POST['passwd'];
    //create query to insert into
    $query = "
    INSERT INTO users (
        firstname,
        lastname,
        mobile_number, 
        idnumber,
        email,
        password
    ) VALUES (
        '$f_name', '$l_name', '$m_number', '$id_number', '$e_mail', '$p_wd'
    )
    ";
    //execute query
    $res = pg_query($conn, $query);
    //validate result
    if($res){
        echo "Users has been created sucessfully!!!";
    } else {
        echo "Something wrong!";
    }
?>