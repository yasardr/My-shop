<?php
    require_once('../Models/crudCustomer.php');

    $customer['name'] = $_POST['name'];
    $customer['lastname'] = $_POST['lastname'];
    $customer['birthday'] = $_POST['birthday'];
    $customer['telephone'] = $_POST['telephone'];
    $customer['email'] = $_POST['email'];
    $customer['username'] = $_POST['username'];
    $customer['password'] = $_POST['password'];

    $address['street'] = $_POST['street'];
    $address['state'] = $_POST['state'];
    $address['country'] = $_POST['country'];
    $address['zip_code'] = $_POST['zip_code'];
    $address['reference'] = $_POST['reference'];

    $crud = new CrudCustomer();
    $user = $crud->addUser($customer, $address);
    if (isset($user)) {
        session_start();
        $_SESSION['user']=$user;
        header('Location: /my_shop');
        exit();
    }
?>