<!DOCTYPE html>
<html lang="en">

<head>
    <title>Guess a Number</title>
</head>

<body>
    <?php
    if (array_key_exists('randomResult', $_POST)) {
        $randomResult = $_POST['randomResult'];
    } else {
        srand((float) microtime() * 10000000);
        $randomResult = rand(1, 100);
    }

    if (array_key_exists('guess', $_POST)) {
        $count = $_POST['count'];
        $guess = $_POST['guess'];
        if ($randomResult > $guess) {
            print("<p>Wrong, please try a higher number. You have tried $count times</p>");
        } else if ($randomResult < $guess) {
            print("<p>Wrong, please try a smaller number. You have tried $count times</p>");
        } else {
            print("<p>CONGRATULATIONS, the answer is $randomResult. You have tried $count times</p>");
        }
        $count++;
    } else {
        $count = 1;
        $guess = '';
    }
    ?>


    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="text" name="randomResult" value="<?php echo $randomResult ?>" style="display: none;">
        <input type="text" name="count" value="<?php echo $count ?>" style="display: none;">
        <table>
            <tr>
                <td>Your guess:</td>
                <td>
                    <input type="text" name="guess" value="<?php echo $guess; ?>">
                </td>
            </tr>
            <?php if ($guess !== '') : ?>
                <tr>
                    <td>
                        <?php
                        if (is_numeric($guess)) {
                            if ($guess == $randomResult) {
                                echo "You are correct! Congratulations!";
                            }
                        } else {
                            echo "You must enter a number!";
                        }
                        ?>
                    </td>
                </tr>
            <?php endif; ?>
            <tr>
                <td align="right">
                    <input type="submit" value="Submit">
                </td>
                <td align="left">
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>