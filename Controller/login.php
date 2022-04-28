<?php
    require_once('../Models/crudCustomer.php');

    if ($_POST['username'] !== '' && $_POST['password'] !== '') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        echo $username."<br>";
        echo $password."<br>";

        $crud = new CrudCustomer();
        $user = $crud->getUser($username, $password);
        if (isset($user)) {
            session_start();
            $_SESSION['user']=$user;
            header('Location: /my_shop');
            exit();
        }
    }
    header('Location: /my_shop?menu=login');
    exit();
?>