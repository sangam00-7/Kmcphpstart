<?php
require_once __DIR__ . '/../src/Models/User.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $user1 = new User("Sandip", "sandipdongxom@gmail.com", "Sandip@123");
    $user1->displayUser();
    ?>
</body>
</html>