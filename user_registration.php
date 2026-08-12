<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST["username"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";
    $confirm_password = $_POST["confirm_password"] ?? "";
    $errors = [];

    if (strlen($username) < 3){
        $errors[] = "The username must be at least 3 characters";
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = "The email must be a valid email address";
    }

    if($password !== $confirm_password){
        $errors[] = "The passwords do not match";
    }

    if (empty($errors)){

        try {
            $dsn = "mysql:host=localhost;port=3306;dbname=php_workshop;charset=utf8mb4";
            $pdo = new PDO($dsn, 'root', '');
        }
        catch(PDOException $e){
            die("Connection failed" . $e->getMessage());
        }

        try{
            $sql_query = "INSERT INTO users(username, email, password) VALUES (:username, :email, :password)";
            $statement = $pdo->prepare($sql_query);

            $data = [
                'username' => $username,
                'email' => $email,
                'password' => $password,
            ];

            $statement->execute($data);
            $userid = $pdo->lastInsertId();

            echo "<p style='color:green;'>";
            echo "User registered";
            echo "</p>";
        }
        catch (PDOException $e) {
            echo "Data could not be inserted" . $e->getMessage();
        }

    }else{
        echo "<div style='color:red;'>";
        foreach($errors as $error){
            echo "<br>";
            echo $error;
        }
        echo "</div>";
    }
}

?>

<form action="" method="post">
    <div>
        <label for="username">Username</label>
        <input type="text" name="username" required>
    </div>

    <div><br>
        <label for="email">Email</label>
        <input type="email" name="email" required>
    </div>

    <br>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password" required>
    </div>

    <br>

    <div>
        <label for="confirm_password">Confirm_password</label>
        <input type="password" name="confirm_password" required>
    </div>

    <br>

    <input type="submit" value="Register">
</form>

</body>
</html>