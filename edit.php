<?php
require 'lib/db.php';
$product = singleProduct($_GET['id']);


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
<form action="update.php" method="post" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $product['id'] ?>">

    <label for="name"> Name </label>
    <input type="text" name="name" value="<?php echo $product['Name'] ?>">

    <label for="description" > Description </label>
    <textarea id="editor" name="description"  > <?php echo $product['Desc']  ?></textarea>

    <label for="price"> Price </label>
    <input type="text" name="price" value="<?php echo $product['Price'] ?>">


    <img  src="img/<?php echo $product['img'] ?>">
    <input type="file" name="img" >

    <input type="submit" value="Update">
</form>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor' );
</script>
</body>
</html>

