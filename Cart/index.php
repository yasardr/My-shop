<?php
    ob_start();
    if (!isset($_SESSION['user'])) {
        header('Location: /my_shop?menu=404');
        exit();
    }

    require_once('Models/crudCart.php');

    $crud = new CrudCart();
    $cart = $crud->getCart($_SESSION['user']);
    if (!isset($cart["cart"]) || !isset($cart["details"])) {
        echo '
            <div class="row">
                <div class="col-6">
                    <div class="alert alert-primary" role="alert">
                        Aún no agregas un producto al carrito.
                    </div>
                </div>
            </div>
        ';
    } else {
        echo '
            <div class="row justify-content-center">
                <div class="col-10">
                    <ul class="list-group">';
        foreach ($cart["details"] as $key => $detail) {
            foreach ($cart["products"] as $key => $p) {
                if ($p->id == $detail->id_product) {
                    $product = $p;
                    break;
                }
            }
            echo '
                <li class="list-group">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4 container-image">
                                <img src="'.$product->url_image.'" class="img-fluid rounded-start img-product" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body d-flex flex-column justify-content-between" style="height: 100%;">
                                    <h5 class="card-title">
                                        '.$product->name.'
                                    </h5>
                                    <p class="card-text">
                                        Cantidad: '.$detail->amount.'
                                    </p>
                                    <p class="card-text d-flex justify-content-between">
                                        <small class="text-muted">$'.$product->price.'</small>
                                        <a href="?menu=cart&product='.$product->id.'&cart='.$cart["cart"]->id.'" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            ';
        }
        echo ' 
                    </ul>
                </div>
                <div class="col-10 d-flex justify-content-end">
                    <span><strong>Total: </strong>'.$cart["cart"]->total.'</span>
                </div>
                <div class="col-10 d-flex justify-content-end mt-3">
                    <a href="Controller/sendEmail.php" class="btn btn-primary">Relizar compra</a>
                </div>
            </div>
        ';
    }

    if (isset($_GET["product"]) && isset($_GET["cart"])) {
        removeCart($_GET["product"], $_GET["cart"]);
    }

    function removeCart($product_id, $cart_id) {
        require_once('Models/crudCart.php');

        $user = $_SESSION['user'];
        $crud = new CrudCart();
        $res = $crud->removeCart($user, $product_id, $cart_id);
        if (isset($res)) {
            header('Location: /my_shop?menu=cart');
            exit();
        }
        header('Location: /my_shop?menu=404');
        exit();
    }
    ob_end_flush();
?>