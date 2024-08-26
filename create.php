<?php

require 'lib/db.php';
if(isset($_POST['name'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $imgName = $_FILES['img']['name'];
    $imgTmpName = $_FILES['img']['tmp_name'];

    move_uploaded_file($imgTmpName, "img/$imgName");

    $res = createProduct([
        'Name' => "$name",
        'Desc' => "$description",
        'Price' => "$price",
        'img' => "$imgName",
    ]);

    if ($res) {
        header('location: index.php');
    }
}
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
<form action="create.php" method="post" enctype="multipart/form-data">

    <label for="name"> Name </label>
    <input type="text" name="name">

    <label for="description"> Description </label>
    <textarea id="editor" name="description"></textarea>

    <label for="price"> Price </label>
    <input type="text" name="price">

    <label for="img"> Image  </label>
    <input type="file" name="img">

    <input type="submit" value="save">
</form>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor' );
</script>
</body>
</html>
