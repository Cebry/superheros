<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>Add Citizen</title>
</head>

<body>
    <header>
        <h1>Add Citizen</h1>
    </header>
    <main>
        <?php include "../views/nav.php"; ?>
        <div class="card grid columns-4">
            <span>name</span>
            <span>email</span>
            <span>id-user</span>
            <span>actions</span>
        </div>
        <?php
        echo '<form action="" method="post" class="card grid columns-4">';
        echo '<input type="text" name="name" id="name" value="">';
        echo '<input type="text" name="email" id="email" value="">';
        echo '<input type="text" name="idUser" id="idUser" value="">';
        echo '<button type="submit" name="submit" value="insert">Insert</button>';
        echo '</form>';
        ?>
    </main>

</body>

</html>