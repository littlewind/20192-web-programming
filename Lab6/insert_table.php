<?php 
    $DBconfig = include('../configDB.php');
?>
<html>
    <head>
      <title>Insert Results</title>
    </head>
    <body>
        <?php
            $description = $_POST['description'];
            $weight = $_POST['weight'];
            $cost = $_POST['cost'];
            $available = $_POST['available'];
            
            if ((strlen($description) > 0) && (strlen($weight) > 0)
               && (strlen($cost) > 0) && (strlen($available) > 0)) {

                $server = $DBconfig['server'];
                $user = $DBconfig['user'];
                $pass = $DBconfig['password'];
                
                $mydb = 'test';
                $table_name = 'Products';
                
                $mysqli = new mysqli($server, $user, $pass, $mydb);
                if ($mysqli->connect_errno) {
                    die ("Cannot connect to $server using $user");
                } else {
                    $SQLcmd = "INSERT INTO $table_name VALUES(0, '$description', $weight, $cost, $available)";
                    $mysqli->select_db($mydb);
                    if ($mysqli->query($SQLcmd)){
                        print("The Query is $SQLcmd<br>");
                        print("Insert into $table_name successfully!");
                    } else {
                        print("Insert into $table_name failed!");
                    } 
                    $mysqli->close();
                }
            } else {
                echo "PLEASE fill up all the fields!";
            }
        ?>
    </body>
</html>