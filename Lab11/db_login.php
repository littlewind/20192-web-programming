  
<?php
    require_once 'DB.php';
    # parameters for connecting to the "business_service" 
    $hostspec = 'localhost:3306';
    $username = 'littlewind';
    $password = 'littlewind';
    $database = 'lab12';
    $dbtype = 'mysqli';
    $dsn = array(
        'phptype'  => $dbtype,
        'username' => $username,
        'password' => $password,
        'hostspec' => $hostspec,
        'database' => $database,
    );
    # DSN constructed from parameters 
    # Establish the connection
    $db = DB::connect($dsn);
    if (DB::isError($db)) {
        die ($db->getMessage());
    }