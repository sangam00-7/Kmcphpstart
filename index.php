<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>

    <form action="Process.php" method="POST">

        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
        </div>

        <br>

        <div>
            <label for="email">Login Email:</label>
            <input type="email" id="email" name="email">
        </div>

        <br>

        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
        </div>

        <br>

        <button type="submit">Login</button>

    </form>

</body>
</html>