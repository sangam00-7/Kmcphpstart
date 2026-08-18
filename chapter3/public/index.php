<?php

require_once __DIR__ . '/../src/Core/Autoloader.php';

use App\Core\Database;
use App\Models\User;

$database = Database::getInstance();
$pdo = $database->getConnection();

$sql = "SELECT * FROM users";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

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

$newUserID = User::create('testuser', 'testuser@example.com', 'password123');
echo"<br>";
echo "New user created with ID: " . $newUserID . "<br>";

echo "<pre>";
print_r($users);
echo "</pre>";

?>

</body>
</html>