<html>
    <head><title>Login</title></head>
    <body>
        <?php
        //session_destroy();
        if (isset($_POST['logout'])) {
            session_start();
            session_destroy();
        }
        //session_destroy();
        session_start();
        if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (checkValidLogin($username, $password) == 1) {
                print('Welcome!');
                //session_start();
                $_SESSION['username'] = $username;
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <input type="hidden" name="logout" value="1">
                    <input type="submit" value="Log out">
                </form>

                <?php
            } else {
                echo "<font color ='red'>Invalid username or password!<font/>";
            }
        } else {
            //session_destroy();
        }
        if (!isset($_SESSION['username'])) {
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                Username: <input type="text" name="username"><br/>
                Password: <input type="password" name="password"><br/>
                <input type="submit" value="Log in">
            </form>
            <?php
        }
        ?>
    </body>
</html>

<?php
function checkValidLogin($user, $pass) {
    require_once 'db_login.php';
    $sql = 'select * from Users where username = ? and password = ?';
    $data = array($user, $pass);
    $result = & $db->query($sql, $data);

    $row = $result->fetchRow();

    if (!is_null($row)) {
        //  print("OK");
        return 1;
    } else {
        // print("NO");
        return 0;
    }
}
?>