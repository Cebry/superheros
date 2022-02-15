<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>Add Request</title>
</head>

<body>
    <header>
        <h1>Add Request</h1>
    </header>
    <?php include "../views/nav.php"; ?>
    <main>
        <?php
        echo '<form action="" method="post">';
        echo '<input type="text" name="title" id="title" value="">';
        echo '<input type="text" name="description" id="description" value="">';
        echo '<input type="text" name="done" id="done" value="">';
        echo '<input type="number" name="idSuperhero" id="idSuperhero" value="">';
        echo '<input type="number" name="idCitizen" id="idCitizen" value="">';
        echo '<button type="submit" name="submit" value="insert">Insert</button>';
        echo '</form>';
        ?>
    </main>
</body>

</html>