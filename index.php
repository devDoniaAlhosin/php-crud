<?php

// Include
// Include_once


//require
//require_once

//require 'lib/db.php';
//Select All Products
//selectProduct([
//    "Name",
//    "Desc" ,
//    "Price",
//    "img"
//]);

// Select Single Product By id
//singleProduct(8);


//createProduct([
//    "Name" => "TV",
//    "Desc" =>  "Its a Tv Unit",
//    "Price" =>  100,
//    "img" => "logo.png"
//]);

//updateProduct(["Name" => "TV unit updated 2 ",
//    "Desc" =>  "Its a Tv Unit updated ",
//    "Price" =>  700,
//   ]
//    , 13);

//deleteProduct(13);


//$products = selectProduct([]);

?>

<?php
require 'lib/db.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: Login.php');
    exit();
}


// Select All Products
$products = selectProduct();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products List</title>
</head>
<body>

<nav> <a href="logout.php">Logout</a> </nav>

<?php if (!empty($products)): ?>
    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>description</th>
            <th>price</th>
            <th>img</th>
            <th>update</th>
            <th>delete</th>
        </tr>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= ($product['id']) ?></td>
                <td><?= ($product['Name']) ?></td>
                <td><?= (substr($product['Desc'], 0, 19) . "...") ?></td>
                <td><?= ($product['Price']) ?></td>
                <td><img src="img/<?= ($product['img']) ?>" alt="<?= ($product['Name']) ?>" style="max-width: 100px;"></td>
                <td><a href="edit.php?id=<?= urlencode($product['id']) ?>">update</a></td>
                <td><a href="delete.php?id=<?= urlencode($product['id']) ?>">delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="create.php"> Create Product  </a>
<?php else: ?>
    <p>No products found.</p>
<?php endif; ?>

</body>
</html>