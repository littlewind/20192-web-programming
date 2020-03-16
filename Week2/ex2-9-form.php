<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receiving Input</title>
</head>
<body>
    <h2>Thank you: Got Your Input.</h2>
    <?php 
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $class = $_POST['class'];
        $university = $_POST['university'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $hobbies = $_POST['hobby'];

        print("<p>Hello, $firstName $lastName</p>");
        print("<p>You are studying at $class, $university</p>");
        print("<p>You are a $gender, $age years old</p>");
        if(isset($hobbies)){
            if(!empty($hobbies)) {
                print("<p>Your hobby is <br>");
                $index = 0;
                foreach($hobbies as $hobby) {
                    $num = $index + 1;
                    print("&nbsp;&nbsp;&nbsp;&nbsp;$num. $hobbies[$index]<br>");
                    $index ++;
                }
            }
        }

        print("</p>");
    ?>
</body>
</html>