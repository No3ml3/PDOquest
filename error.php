<?php
include 'index.php';
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
    <?php

    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!isset($_POST['firstname']) || trim($_POST['firstname']) === '') {
            $errors[] = "Le prénom est obligatoire";
        }
        if (strlen($_POST['firstname']) > 45) {
            $errors[] = "Le prénom ne doit pas dépasser 45 caratère";
        }
        if (!isset($_POST['lastname']) || trim($_POST['lastname']) === '') {
            $errors[] = "Le nom est obligatoire";
        }
        if (strlen($_POST['lastname']) > 45) {
            $errors[] = "Le nom ne doit pas dépasser 45 caratère";
        }
    }

    if (isset($_POST['firstname'])) {
        if (empty($errors)) {
            $firstname = trim($_POST['firstname']);
            $lastname = trim($_POST['lastname']);

            $query = 'INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)';
            $statement = $pdo->prepare($query);

            $statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
            $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);

            $statement->execute();
        }
        header('Location: index.php');
    }
    ?>

    <ul>
        <?php if (!empty($errors)) : ?>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?= $error; ?></li>
                <?php endforeach ?>
            </ul>
            <?php header('Location: index.php'); ?>
        <?php endif ?>
    </ul>
</body>
</html>