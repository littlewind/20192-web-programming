<?php 
    $DBconfig = include('../configDB.php');
?>
<html>
    <head>
      <title>Search Results</title>
    </head>
    <body>
        <?php
            if (!isset($_POST['product'])) {
                exit();
            }
            $product = $_POST['product'];
            if (strlen($product) == 0) {
                exit();
            }
            $server = $DBconfig['server'];
            $user = $DBconfig['user'];
            $pass = $DBconfig['password'];
            $mydb = 'test';
            $table_name = 'Products';
            $mysqli = new mysqli($server, $user, $pass, $mydb);
            if ($mysqli->connect_errno) {
                die("Cannot connect to $server using $user");
            } else {
                $SQLcmd = "SELECT * FROM $table_name WHERE (Product_desc = '$product')";
                $mysqli->select_db($mydb);
                $results = $mysqli->query($SQLcmd);
                if ($results){
                    print('<font size="4" color="blue" >Products Data</font><br>');
                    print("The Query is $SQLcmd<br></br>");
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
                    die("Query Failed, SQLcmd=$SQLcmd");
                } 
                $mysqli->close();
            }
        ?>
    </body>
</html>