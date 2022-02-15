<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/superheroes/public/css/normalize.css">
    <link rel="stylesheet" href="/superheroes/public/css/styles.css">
    <!-- <script src="js/script.js"></script> -->
    <title>Delete Superhero</title>
</head>

<body>
    <header>
        <h1>Delete Superhero</h1>
    </header>
    <?php include "../views/nav.php"; ?>
    <main>
        <form action="" method="post" class="card">
            <input type="number" name="id" id="id" value="<?php echo $data['id'] ?>" readonly>
            <input type="text" name="nombre" id="nombre" value="<?php echo $data['name'] ?>" readonly>
            <input type="datetime" name="createdAt" id="createdAt" value="<?php echo $data['created_at'] ?>" readonly>
            <input type="datetime" name="updatedAt" id="updatedAt" value="<?php echo $data['updated_at'] ?>" readonly>
            <button type=" submit" name="submit" value="delete">Delete</button>
        </form>
        <!-- TODO abilities -->
    </main>

</body>

</html>