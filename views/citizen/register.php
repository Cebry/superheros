<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>Register</title>
</head>

<body>
    <?php include "../views/nav.php"; ?>
    <?php include "../views/header.php"; ?>
    <main>
        <header>
            <h2>Register</h2>
        </header>
        <form action="" method="post" class="card grid columns-5">
            <label for="user">user</label>
            <label for="psw">psw</label>
            <label for="name">name</label>
            <label for="email">email</label>
            <label for="">actions</label>
            <input type="text" name="user" id="user" value="">
            <input type="text" name="psw" id="psw" value="">
            <input type="text" name="name" id="name" value="">
            <input type="text" name="email" id="email" value="">

            <button type="submit" name="submit" value="register">Register</button>
        </form>
    </main>
</body>

</html>