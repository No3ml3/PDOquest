<?php
require_once '_connec.php';

$pdo = new \PDO(DSN, USER, PASS);

$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll(PDO::FETCH_ASSOC);
var_dump($friends);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>
        <?php foreach ($friends as $friend) : ?>
            <li> <?= $friend['firstname'] . ' ' . $friend['lastname']; ?> </li>
        <?php endforeach ?>
    </ul>



    <form action="error.php" method="post">
        <div>
            <label for="firstname">firstname :</label>
            <input type="text" id="firstname" name="firstname" maxlength="45" required>
        </div>
        <div>
            <label for="lastname">lastname :</label>
            <input type="text" id="lastname" name="lastname" maxlength="45" required>
        </div>
        <div class="button">
            <button type="submit">send</button>
        </div>
    </form>
</body>
</html>