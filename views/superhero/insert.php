<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>Add Superhero</title>
</head>

<body>
    <header>
        <h1>Add Superhero</h1>
    </header>
    <?php include "../views/nav.php"; ?>
    <main>
        <div class="card grid columns-5">
            <span>name</span>
            <span>image</span>
            <span>evolution</span>
            <span>id_user</span>
            <span>actions</span>
        </div>
        <form action="" method="post" class="card grid columns-5">
            <input type="text" name="name" id="name" value="">
            <input type="text" name="image" id="image" value="">
            <input type="text" name="evolution" id="evolution" value="">
            <input type="number" name="id_user" id="id_user" value="">
            <button type="submit" name="submit" value="insert">Insert</button>
        </form>
    </main>

</body>

</html>