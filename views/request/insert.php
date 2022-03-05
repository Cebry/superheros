<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>New request</title>
</head>

<body>
    <?php include "../views/header.php"; ?>
    <?php include "../views/nav.php"; ?>
    <main>
        <header>
            <h2>New request</h2>
        </header>
        <div class="card grid columns-3">
            <span>title</span>
            <span>description</span>
            <span>actions</span>
        </div>
        <form action="" method="post" class="card grid columns-3">
            <input type="text" name="title" id="title" value="">
            <input type="text" name="description" id="description" value="">
            <input type="text" name="done" id="done" value="0" hidden>
            <input type="text" name="superhero_id" id="done" value="<?php echo $_POST['superhero_id'] ?>" hidden>
            <input type="text" name="citizen_id" id="done" value="<?php echo $_POST['citizen_id'] ?>" hidden>
            <button type="submit" name="submit" value="insert">Insert</button>
        </form>

    </main>
</body>

</html>