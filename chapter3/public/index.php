<?php
//require_once __DIR__ . '/../src/Models/User.php';
require_once __DIR__ . '/../src/Core/Autoloader.php';


use App\Models\User;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KMC Buddies</title>
</head>
<body>
    <?php
    $localhost = new App\Core\Database();
    $pdo = $localhost->getConnection();

    $sql_query = "SELECT * FROM users";
    $stmt = $pdo->prepare($sql_query);
    $stmt->execute();
    $results = $stmt->fetchAll();
    print_r($results);
   // echo "<br>";
    //$user1 = new App\Models\User("Dinesh", "dineshdong@example.com", "paword123");
    //$user1->displayUser();
    ?>
</body>
</html>