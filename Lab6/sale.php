<?php 
    $DBconfig = include('../configDB.php');
?>
<html>
    <head>
        <title>Update products</title>
    </head>
    <body>
        <?php
            $server = $DBconfig['server'];
            $user = $DBconfig['user'];
            $pass = $DBconfig['password'];
            $mydb = 'test';
            $table_name = 'Products';
            $mysqli = new mysqli($server, $user, $pass, $mydb);
            if ($mysqli->connect_errno) {
                die ("Cannot connect to $server using $user");
            } else {
                $mysqli->select_db($mydb);
                if (isset($_POST['product'])) {
                    $product = $_POST['product'];
                    $updateQuery = "UPDATE $table_name SET Numb = Numb - 1 WHERE(Product_desc = '$product')";
                    if ($mysqli->query($updateQuery)) {
                        print "Update success!";
                    } else {
                        print "Update fail!";
                    }
                    print("<br>The query is $updateQuery<br>");
                }
                print "<br><br>";
                $SQLcmd = "SELECT * FROM $table_name";
                $results = $mysqli->query($SQLcmd);
                if ($results){
                    print '<table border=1>';
                    print '<th>Num<th>Product<th>Cost<th>Weight<th>Count';
                    while($row = mysqli_fetch_row($results)) {
                        print "<tr>";
                        foreach($row as $field) {
                            print "<td>$field</td>";
                        }
                        print "<tr/>";
                    }
                } else {
                    die ("Query Failed, SQLcmd=$SQLcmd");
                } 
                $mysqli->close();
            }
        ?>
    </body>
</html>