<?php


require 'lib/db.php';
deleteProduct($_GET['id']);



header('location: index.php');

?>