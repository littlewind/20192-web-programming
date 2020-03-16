<html>
    <head>
        <title>Exercise 2.9</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <form action="ex2-9-form.php" method="POST">
        First Name:<br />
        <input type="text" id="firstName" name="firstName" /><br />
      
        Last Name:<br /> 
        <input type="text" id="lastName" name="lastName" /><br />  
      
        Class:<br /> 
        <input type="text" id="class" name="class" /><br />

        University:<br /> 
        <input type="text" id="university" name="university" /><br /><br />
        
        Age:<br /> 
        <input type="number" id="age" name="age" /><br /><br />
              
        Gender: <br />
        <input type="radio" id="gender" name="gender" value="male" /> Male<br />
        <input type="radio" id="gender2" name="gender" value="female" />Female<br />
        <input type="radio" id="gender3" name="gender" value="other" />Other<br /><br />
        
        Hobbies: <br />
        <input type="checkbox" id="hobby1" name="hobby[]" value="Reading books" />
        <label for="hobby1">Reading books</label><br />
        <input type="checkbox" id="hobby2" name="hobby[]" value="Listening to music" />
        <label for="hobby2">Listening to music</label><br />
        <input type="checkbox" id="hobby3" name="hobby[]" value="Taking photographs" />
        <label for="hobby3">Taking photographs</label><br />
        <input type="checkbox" id="hobby4" name="hobby[]" value="Hiking" />
        <label for="hobby4">Hiking</label><br /><br />
        
        <input type="SUBMIT" value="Submit">
        <input type="RESET" value="Clear">
    </form>
    </body>
</html>