<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>Edit Citizen</title>
</head>

<body>
    <header>
        <h1>Edit Citizen</h1>
    </header>
    <?php include "../views/nav.php"; ?>
    <main>
        <form action="" method="post" class="card">

            <input type="number" name="id" id="id" value="<?php echo $data['id'] ?>" readonly>
            <input type="text" name="name" id="name" value="<?php echo $data['name'] ?>">
            <input type="text" name="email" id="email" value="<?php echo $data['email'] ?>">
            <input type="number" name="idUser" id="idUser" value="<?php echo $data['idUser'] ?>">
            <input type="datetime" name="createdAt" id="createdAt" value="<?php echo $data['created_at'] ?> " readonly>
            <input type="datetime" name="updatedAt" id="updatedAt" value="<?php echo $data['updated_at'] ?>" readonly>
            <button type="submit" name="submit" value="update">Update</button>
        </form>
    </main>

</body>

</html>