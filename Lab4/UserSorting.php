<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>User Sorting</title>
</head>

<body>
    <?php
    if (array_key_exists('submitted', $_POST)) {
        $submitted = true;
    } else {
        $submitted = false;
    }

    if (array_key_exists('sort_type', $_POST)) {
        $sort_type = $_POST['sort_type'];
    } else {
        $sort_type = 'unsort';
    }


    function user_sort($a, $b)
    {
        if ($b == 'smarts') {
            return 1;
        } else if ($a == 'smarts') {
            return -1;
        }

        return ($a == $b) ? 0 : (($a < $b) ? -1 : 1);
    }

    $values = array(
        'name' => 'Buzz Lightyear',
        'email_address' => 'buzz@starcommand.gal',
        'age' => 32,
        'smarts' => 'some'
    );

    $sortTypes = array(
        'unsort' => 'Unsorted',
        'sort'  => 'Standard sort',
        'rsort' => 'Reverse sort',
        'usort' => 'User-defined sort',
        'ksort' => 'Reverse key sort',
        'uksort' => 'User-defined key sort',
        'asort' => 'Value sort',
        'arsort' => 'Reverse value sort',
        'uasort' => 'User-defined value sort'
    );

    if ($submitted) {
        if ($sort_type == 'usort' || $sort_type == 'uksort' || $sort_type == 'uasort') {
            $sort_type($values, 'user_sort');
        } else if ($sort_type == 'unsort') {
            $values = array(
                'name' => 'Buzz Lightyear',
                'email_address' => 'buzz@starcommand.gal',
                'age' => 32,
                'smarts' => 'some'
            );
        } else {
            $sort_type($values);
        }
    }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <?php
        foreach ($sortTypes as $key => $value) {
            if ($sort_type == $key)
                print "<input type=\"radio\" name=\"sort_type\" value=\"$key\" checked=\"checked\"/> $value<br />";
            else
                print "<input type=\"radio\" name=\"sort_type\" value=\"$key\" /> $value<br />";
        }
        ?>

        <p align="center">
            <input type="submit" value="Sort" name="submitted" />
        </p>

        <p>
            Values <?= $submitted ? "sorted by $sort_type" : "unsorted"; ?>:
        </p>

        <ul>
            <?php
            foreach ($values as $key => $value) {
                echo "<li><b>$key</b>: $value</li>";
            }
            ?>
        </ul>
    </form>
</body>

</html>