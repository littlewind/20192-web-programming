<html>
  <head>
    <title>Date Time Processing</title>
  </head>
  <body>
     <font size="5" color="blue">Date Time Processing</font>
    <br>
    <p>Enter your name and select date and time for the appointment</p>
    <br>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
    <?php
        if (array_key_exists("day", $_GET)) {
            $day = $_GET["day"];
            $month = $_GET["month"];
            $year = $_GET["year"];
            $hour = $_GET["hour"];
            $min = $_GET["min"];
            $sec = $_GET["sec"];
        } else {
            $day = 1;
            $month = 1;
            $year = 1900;
            $hour = 0;
            $min = 0;
            $sec = 0;
        }
    ?>
        <table>
            <tr>
                <td>Your name: </td>
                <td><input type="text" size="10" maxlength="255" name="name"></td>
            </tr>
            
            <tr>
                <td>Date: </td>
                <td>
                    <select name="day">
                    <?php
                      for($i = 1; $i <= 31; $i++) {
                        if ($day == $i) {
                          print("<option selected>$i</option>");
                        } else 
                          print("<option>$i</option>");
                      }
                    ?>
                    </select>
                    
                    <select name="month">
                      <?php
                        for($i = 1; $i <= 12; $i++) {
                          if ($month == $i) {
                            print("<option selected>$i</option>");
                          } else 
                            print("<option>$i</option>");
                        }
                      ?>
                    </select>
                    
                    <select name="year">
                      <?php
                        for($i = 1900; $i <= 2100 ; $i++) {
                          if ($year == $i) {
                            print("<option selected>$i</option>");
                          } else 
                            print("<option>$i</option>");
                        }
                      ?>
                    </select>
                </td>
            </tr>
            
            <tr>
              <td>Time: </td>
              <td>
                <select name="hour">
                    <?php
                      for($i = 0; $i <= 23 ; $i++) {
                        if ($hour == $i) {
                          print("<option selected>$i</option>");
                        } else 
                          print("<option>$i</option>");
                      }
                    ?>
                </select>
                  
                <select name="min">
                    <?php
                      for($i = 0; $i <= 59; $i++) {
                        if ($min == $i) {
                          print("<option selected>$i</option>");
                        } else 
                          print("<option>$i</option>");
                      }
                    ?>
                </select>
                  
                <select name="sec">
                    <?php
                      for($i = 0; $i <= 59; $i++) {
                        if ($sec == $i) {
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
            if (array_key_exists("name", $_GET)) {
                $name = $_GET["name"];
                $day = $_GET["day"];
                $month = $_GET["month"];
                $year = $_GET["year"];
                $hour = $_GET["hour"];
                $min = $_GET["min"];
                $sec = $_GET["sec"];

                echo "Hi $name!<br>You have choose to have an appointment on $hour:$min:$sec, $day/$month/$year<br>";
                echo "<br>More information<br><br>";
                if ($hour >= 12) {
                    echo "In 12 hours, the time and date is " .($hour - 12).":$min:$sec PM, $day/$month/$year<br>";
                } else {
                    echo "In 12 hours, the time and date is $hour:$min:$sec AM, $day/$month/$year<br>";
                }
                
                switch($month) {
                  case 1:
                  case 3:
                  case 5:
                  case 7:
                  case 8:
                  case 10:
                  case 12:
                    $daysOfMonth = 31;
                  break;
                  case 4:
                  case 6:
                  case 9:
                  case 11:
                    $daysOfMonth = 30;
                  break;
                  case 2:
                    if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
                      $daysOfMonth = 29;
                    } else {
                      $daysOfMonth = 28;
                    }
                }
                print "<br>This month has $daysOfMonth days!";
            }
          ?>
    </form>
  </body>
</html>