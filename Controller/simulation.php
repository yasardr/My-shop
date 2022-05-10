<?php
    require_once('../Models/crudCustomer.php');

    if (isset($_GET["createClients"])) {
        addCustomers($_GET["createClients"]);
    }

    function addCustomers($product_id) {
        $crud = new CrudCustomer();
        $res = $crud->createCustomers();
        if (isset($res)) {
            if ($res->total > 299) {
                echo 'Ya se han creado los clientes...';
            }
            header('Location: /my_shop');
            exit();
        }
        header('Location: /my_shop?menu=404');
        exit();
    }
    // ob_end_flush();
?>