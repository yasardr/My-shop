<?php
    require_once('../Models/crudCustomer.php');

    session_start();
    unset($_SESSION['user']);
    header('Location: /my_shop');
    exit();
?>