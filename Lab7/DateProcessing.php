<html>
    <head>
        <title>Date Check</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
            $date = $_POST["date"];
            $two = '[[:digit:]]{2}';
            $month = '[0-1][[:digit:]]';
            $day = '[0-3][[:digit:]]';
            $year = "2[[:digit:]]$two";
            $pattern = "~^($month)/($day)/($year)$~";
            print("$pattern <br>");
            if (preg_match($pattern, $date)) {
//            if (preg_match("~^($month)/($day)/($year)$~", $date)) {
                print "Valid date = $date <br>";
            } else {
                print "Invalid date = $date <br>";
            }
        ?>
    </body>
</html>
