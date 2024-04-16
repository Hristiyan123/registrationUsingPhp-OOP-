<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h3>SingUp</h3>

    <form action="includes/signup.inc.php" method="post">  
        <input type="text" name="username" placeholder="<?php echo htmlspecialchars("Username"); ?>">
        <input type="password" name="pwd" placeholder="<?php echo htmlspecialchars("Password"); ?>">
        <input type="text" name="email" placeholder="<?php echo htmlspecialchars("E-mail"); ?>">
        <button>Signup</button>
    </form>

</body>
</html>
