<html>
    <head>
        <title>Coin Flip!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <font size="4" color="blue"> Please Pick Heads or Tails! </font>
        <form action="GotFlip.php" method ="POST">
            <?php
                print "<Input type=\"radio\" Name=\"pick\" Value = 0> Heads";
                print "<Input type=\"radio\" Name=\"pick\" Value = 1> Tails";
                print "<br>";
            ?>
            <input type="submit" value="Submit">
            <input type="reset" value="Restart">
        </form>
    </body>
</html>
