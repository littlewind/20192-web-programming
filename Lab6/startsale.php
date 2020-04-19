<?php 
    $DBconfig = include('../configDB.php');
?>
<html>
    <head>
        <title>Inventory Management</title>
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
                $SQLcmd = "SELECT * FROM $table_name";
                $mysqli->select_db($mydb);
                $results = $mysqli->query($SQLcmd);
                if ($results){
                    $productArray = array();
                    while($product = mysqli_fetch_object($results)) {
                        $productArray[]= $product;
                    }
                    
//                    print(count($productArray));
                    
                    print('<font size="4" color="blue" >Select Product We Just Sold:</font><br>');
                    print('<form action="sale.php" method="POST">');
                    
                    foreach ($productArray as $product){
//                        var_dump($product);
                        print("<label>{$product->Product_desc}</label><input type='radio' name='product' value='$product->Product_desc'>");
                        print("<br>");
                    }
                    
                    print('<input type="submit" value="Click To Submit">');
                    print('<input type="reset" value="Reset">');
                    print('</form>');
                    
                    print("<br>The Query is $SQLcmd");
                    print('<table border=1>');
                    print('<th>Num<th>Product<th>Cost<th>Weight<th>Count');
                    foreach ($productArray as $product){
                        print "<tr> "
                                . "<th>$product->ProductID"
                                . "<th>$product->Product_desc"
                                . "<th>$product->Cost"
                                . "<th>$product->Weight"
                                . "<th>$product->Numb"
                              . "<tr/>";
                    }
                } else {
                    die ("Query Failed, SQLcmd=$SQLcmd");
                } 
                $mysqli->close();
            }
        ?>
  </body>
</html>