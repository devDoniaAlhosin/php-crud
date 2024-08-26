<?php


function  connection()
{
    return mysqli_connect("localhost","root","root" , "lab_3");

};


//  regisetrUser([ 'username' => $name , ....  ])
function registerUser($data)
{
    $conn = connection();
    $col = '';
    $val = '';
    foreach ($data as $key => $value) {
        $col .= "`$key`,";
        $val .= "'" . mysqli_real_escape_string($conn, $value) . "',";
    }
    $col = rtrim($col, ",");
    $val = rtrim($val, ",");

    $sql = "INSERT INTO `users` ($col) VALUES ($val)";
    $query = mysqli_query($conn,$sql);
    if(mysqli_affected_rows($conn)){
         echo 'Registered successfully';
         return mysqli_affected_rows($conn);
    }else{
        echo 'Registration failed';
    }
}

// SELECT `id`, `username`, `password`, `age`, `status` FROM `users` WHERE `id` = $id
function selectUser()
{
    $con = connection();
    $sql = "SELECT  *   FROM `users` ";
    $query = mysqli_query($con , $sql);
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
    if ($results) {
        return $results;
    } else {
        echo "No Users Found";
        return  [];
    }

};

// Multiple  == SELECT `Name`, `Desc`, `Price`, `img`, `id` FROM `products` WHERE 1
function selectProduct(){
    $con = connection();

    $sql = "SELECT  *   FROM `products` ";


    $query = mysqli_query($con , $sql);
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
    if ($results) {
        echo "Products Selected Successfully";
        return $results;
    } else {
        echo "No Products Found";
    }

};


// Select Single by id
function singleProduct($id){
    $con = connection();
    $col = '';

    $sql = "SELECT  *  FROM `products` WHERE  `id` = '$id'";


    $query = mysqli_query($con , $sql);
    $results = mysqli_fetch_assoc($query);
    if ($results) {
        echo "Single Product Selected Successfully";
    } else {
        echo "No Product Found";
    }


    return $results;
}

// Create  == INSERT INTO `products`(`Name`, `Desc`, `Price`, `img`, `id`) VALUES
// ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
function createProduct(array $data)
{
    $con = connection();
    $col = '';
    $values = '';
    foreach ($data as $key => $value) {
        $col .= " `$key` ," ;
        $values .= " '$value' ," ;
    }

    $col =  rtrim($col, ',');
    $values = rtrim($values, ',');


    $sql = "INSERT INTO `products`($col) VALUES ($values)";
    mysqli_query($con , $sql);
    if(mysqli_affected_rows($con)){
        echo "Product Created Successfully";
        return mysqli_affected_rows($con);
    }

};

// Update == UPDATE `products` SET `Name`='[value-1]',`Desc`='[value-2]',`Price`='[value-3]',`img`='[value-4]',`id`='[value-5]'
// WHERE 1


function updateProduct(array $data ,int $id)
{
    $con = connection();
    $col = '';

    if (empty($data)) {
        echo "No data provided for update.";
        return;
    }
    foreach ($data as $key => $value) {
        $col .= " `$key` = '$value' ," ;
    }

    $col =  rtrim($col, ',');
    if (empty($id)) {
        echo "Invalid product ID.";
        return;
    }

    $sql = "UPDATE `products` SET $col WHERE  `id` = $id ";
    mysqli_query($con , $sql);
    if(mysqli_affected_rows($con)){
        echo "Product Updated  Successfully";
        return mysqli_affected_rows($con);
    }else {
        echo "Product Update Failed or No Changes Made";
    }

}
//Delete == DELETE FROM `products` WHERE 0
function deleteProduct($id){
    $con = connection();
    $sql = "DELETE FROM `products` WHERE  `id` = $id ";
    mysqli_query($con , $sql);
    if(mysqli_affected_rows($con)){
        echo "Product Deleted  Successfully";
        return mysqli_affected_rows($con);
    }else {
        echo "Product Delete Failed or No Delete Made";
    }

}

