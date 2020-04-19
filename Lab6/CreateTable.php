 <html>
    <head>
        <title>Create Table</title>
    </head>
     
    <body>
        <?php 
        $server = 'localhost'; 
        $user = 'littlewind'; 
        $pass = 'littlewind'; 
        $mydb = 'test'; 
        $table_name = 'Products'; 

        $mysqli = new mysqli($server, $user, $pass, $mydb);
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        } else {
            $SQLcmd = "CREATE TABLE $table_name ( ProductID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, Product_desc VARCHAR(50), Cost INT, Weight INT, Numb INT)";
            $res = $mysqli->query($SQLcmd);
            
            if ($res) {
                print '<font size="4" color="blue" >Created Table';
                print "<i>$table_name</i> in database<i>$mydb</i><br></font>"; 
                print "<br>SQLcmd=$SQLcmd";
            } else {
                print("$mysqli->error<br>");
                die ("Table Create Creation Failed SQLcmd=$SQLcmd");
            }
        }
             
        $mysqli->close();
        
        ?>
    </body>
 </html>
