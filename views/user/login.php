<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <title>Login</title>
</head>

<body>
    <?php include "../views/header.php"; ?>
    <?php include "../views/nav.php"; ?>
    <main>
        <header>
            <h2>Login</h2>
        </header>
        <form action="" method="post" class="card flex-vertical">
            <div class=" grid columns-2">
                <label for="user">User</label>
                <input type="text" name="user" id="user" value="">
                <label for="psw">Password</label>
                <input type="text" name="psw" id="psw" value="">
            </div>
            <button type="submit" name="submit" value="login">Log In</button>
        </form>
    </main>

</body>

</html>