<?php


require 'lib/db.php';


$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$imageName = $_FILES['img']['name'];
$imageTmpName = $_FILES['img']['tmp_name'];

move_uploaded_file($imageTmpName, "img/" . $imageName);


updateProduct([
    'id' => $id,
    'Name' => $name,
    'Desc' => $description,
    'Price' => $price,
    'img' => $imageName
],$id);

header('location: index.php');

?>