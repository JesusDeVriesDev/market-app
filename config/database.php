<?php
    
    $supa_host       =   "aws-1-us-east-1.pooler.supabase.com";
    $supa_user       =   "postgres.pglncvzjwiqhfozqetve";
    $supa_password   =   "unicesmag@@";
    $supa_dbname     =   "postgres";
    $supa_port       =   "6543";
    
    //Database connection

    $local_host       =   "localhost";
    $local_user       =   "postgres";
    $local_password   =   "unicesmag";
    $local_dbname     =   "marketapp";
    $local_port       =   "5432";

    $supa_data_connection = "
        host=$supa_host
        user=$supa_user
        dbname=$supa_dbname
        password=$supa_password
        port=$supa_port
    ";

    $local_data_connection = "
        host=$local_host
        user=$local_user
        password=$local_password
        dbname=$local_dbname
        port=$local_port
    ";

    $conn_supa = pg_connect($supa_data_connection);
    $conn_local = pg_connect($local_data_connection);

    if(!$conn_supa) {
        echo "ERROR: ".pg_last_error();
    }
?>