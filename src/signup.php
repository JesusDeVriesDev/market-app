<?php
    //get database acces
    require('../config/database.php');
    //get form data
    $f_name = $_POST['fname'];
    $l_name = $_POST['lname'];
    $m_number = $_POST['mnumber'];
    $ide_number = $_POST['idenumber'];
    $e_mail = $_POST['email'];
    $p_wd = $_POST['passwd'];

    $ec_pass = password_hash($p_wd, PASSWORD_BCRYPT);

    //create query to insert into
    $query = "
    INSERT INTO users (
        firstname,
        lastname,
        mobile_number, 
        ide_number,
        email,
        password

    ) VALUES (
        '$f_name', '$l_name', '$m_number', '$ide_number', '$e_mail', '$ec_pass'
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