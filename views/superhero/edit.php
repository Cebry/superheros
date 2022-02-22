<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.4">
    <meta name="author" content="Javier Cebrián Muñoz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php include "../views/styles.php"; ?>
    <!-- <script src="js/script.js"></script> -->
    <title>Edit Superhero</title>
</head>

<body>
    <header>
        <h1>Edit Superhero</h1>
    </header>
    <?php include "../views/nav.php"; ?>
    <main>
        <div class="card grid columns-8">
            <span>id</span>
            <span>name</span>
            <span>image</span>
            <span>evolution</span>
            <span>id_user</span>
            <span>created-at</span>
            <span>updated-at</span>
            <span>actions</span>
        </div>
        <form action="" method="post" class="card grid columns-8">
            <?php
            $superhero = $data[0];
            $users = $data[1];
            // TODO: evoution
            // $evolutions = $data[2];
            ?>
            <input type="number" name="id" id="id" value="<?php echo $superhero['id'] ?>" readonly>
            <input type="text" name="name" id="name" value="<?php echo $superhero['name'] ?>">
            <input type="text" name="image" id="image" value="<?php echo $superhero['image'] ?>">
            <input type="text" name="evolution" id="evolution" value="<?php echo $superhero['evolution'] ?>">
            <!-- TODO: evoution -->
            <!--     <select name="evolution" id="evolution" value="<?php echo $citizen['evolution'] ?>">
                <?php
                foreach ($evolutions as $evolution) {
                    echo '<option value="volvo">' . $evolution['name'] . '</option>';
                }
                ?>
            </select> -->
            <select name="idUser" id="idUser" value="<?php echo $citizen['idUser'] ?>">
                <?php
                foreach ($users as $user) {
                    echo '<option value="volvo">' . $user['id'] . '</option>';
                }
                ?>
            </select>
            <input type="datetime" name="createdAt" id="createdAt" value="<?php echo $superhero['created_at'] ?> " readonly>
            <input type="datetime" name="updatedAt" id="updatedAt" value="<?php echo $superhero['updated_at'] ?>" readonly>
            <button type="submit" name="submit" value="update">Update</button>
        </form>
    </main>

</body>

</html>