<html>
    <head>
        <title>Date Time Function</title>
    </head>
    <body>
        <h2>Date Time Function</h2>
        <br>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
            <table>
                <tr>
                    <td>Person 1: </td>
                    <td><input type="text" name="name1" size="10" maxlength="255"></td>
                    <td>
                        <select name="day1">
                            <?php
                                for($i = 1; $i <= 31; $i++) {
                                    if ($day1 == $i) {
                                        print("<option selected>$i</option>");
                                    } else 
                                        print("<option>$i</option>");
                                }
                            ?>
                        </select>
                        
                        <select name="month1">
                            <?php
                                for($i = 1; $i <= 12; $i++) {
                                    if ($month1 == $i) {
                                        print("<option selected>$i</option>");
                                    } else 
                                        print("<option>$i</option>");
                                }
                            ?>
                        </select>
                        
                        <select name="year1">
                            <?php
                                for($i = 1900; $i <= 2100 ; $i++) {
                                    if ($year1 == $i) {
                                        print("<option selected>$i</option>");
                                    } else 
                                        print("<option>$i</option>");
                                }
                            ?>
                        </select>
                    </td>
                </tr>
              
                <tr>
                    <td>Person 2: </td>
                    <td><input type="text" name="name2" size="10" maxlength="255"></td>
                    <td>
                        <select name="day2">
                            <?php
                                for($i = 1; $i <= 31; $i++) {
                                    if ($day2 == $i) {
                                        print("<option selected>$i</option>");
                                    } else 
                                        print("<option>$i</option>");
                                }
                            ?>
                        </select>
                        
                        <select name="month2">
                            <?php
                                for($i = 1; $i <= 12; $i++) {
                                    if ($month2 == $i) {
                                        print("<option selected>$i</option>");
                                    } else 
                                        print("<option>$i</option>");
                                }
                            ?>
                        </select>
                        
                        <select name="year2">
                            <?php
                                for($i = 1900; $i <= 2100 ; $i++) {
                                    if ($year2 == $i) {
                                        print("<option selected>$i</option>");
                                    } else 
                                        print("<option>$i</option>");
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td align="right"><input type="submit" value="Submit"></td>
                    <td align="left"><input type="reset" value="Reset"></td>
                </tr>
            </table>
            
            <?php
                function printBirthday($day, $month, $year) {
                    $date = date_create();
                    date_date_set($date, $year, $month, $day);
                    $dateInLetters = date_format($date, 'l, F d, Y');
                    print "birthday: ".$dateInLetters."<br>";
                }
                
                function displayPersonInfo($name, $day, $month, $year) {
                    if (checkdate($month, $day, $year)) {
                        print "<br>Information of $name: <br>";
                        printBirthday($day, $month, $year);
                        $age = date('Y') - $year;
                        print "age: $age<br>";
                    }
                }
                
                if (array_key_exists("name1", $_GET)) {
                    $name1 = $_GET['name1'];
                $name2 = $_GET['name2'];
                if (strlen($name1) > 0) {
                    $day1 = $_GET['day1'];
                    $month1 = $_GET['month1'];
                    $year1 = $_GET['year1'];
                    displayPersonInfo($name1, $day1, $month1, $year1);
                }
                if (strlen($name2) > 0) {
                    $day2 = $_GET['day2'];
                    $month2 = $_GET['month2'];
                    $year2 = $_GET['year2'];
                    displayPersonInfo($name2, $day2, $month2, $year2);
                }
                if (strlen($name1) > 0 && strlen($name2) > 0) {
                    $day1 = $_GET['day1'];
                    $month1 = $_GET['month1'];
                    $year1 = $_GET['year1'];
                    $day2 = $_GET['day2'];
                    $month2 = $_GET['month2'];
                    $year2 = $_GET['year2'];

                    $date1 = date_create();
                    date_date_set($date1, $year1, $month1, $day1);
                    $date2 = date_create();
                    date_date_set($date2, $year2, $month2, $day2);
                    $diff = date_diff($date1, $date2, true);
                    print "<br>Difference between 2 dates is ".$diff->format('%a')." days.<br>";

                    $ageDiff = abs($date1->format('Y') - $date2->format('Y'));
                    print "<br>Age difference is $ageDiff.";
                }
                }
            ?>
        </form>
    </body>
</html>