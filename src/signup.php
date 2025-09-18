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

    $ec_pass = password_hash($p_wd, PASSWORD_DEFAULT);

    $check_email = "
        SELECT
            u.email
        FROM    
            users u
        WHERE
            email = '$e_mail' or ide_number = '$ide_number'
            LIMIT 1
    ";

    $res_check = pg_query($conn, $check_email);
    if (pg_num_rows($res_check) > 0) {
        echo "<script>alert('User already exists !!')</script>";
        header('refresh:0;url=signup.html');
    } else {
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
            '$f_name', '$l_name', '$m_number', '$ide_number', '$e_mail', '$p_wd'
        )
        ";
        //execute query
        $res = pg_query($conn, $query);
        //validate result
        if($res){
            //echo "Users has been created sucessfully!!!";
            echo "<script>alert('Sucess !!! Go to login')</script>";
            header('refresh:0;url=signin.html');
        } else {
            echo "Something wrong!";
        }
    }
?>