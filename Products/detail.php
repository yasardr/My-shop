<?php
    if (!isset($_SESSION['user'])) {
        header('Location: /my_shop?menu=404');
        exit();
    }

    require_once('Models/crudProduct.php');

    $crud = new CrudProduct();
    $product = $crud->getProduct($_GET['product']);
    if (!isset($product)) {
        header('Location: /my_shop?menu=404');
        exit();
    }

    $disabled = $product->stock == 0 ? 'pointer-events: none;' : '';
    $btn = $product->stock == 0 ? 'btn-secondary' : 'btn-primary';

    echo '
        <div class="row justify-content-md-center mt-3">
            <div class="col-12 col-md-8">
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
                                    '.$product->description.'
                                </p>
                                <p class="card-text">
                                    Cantidad: '.$product->stock.'
                                </p>
                                <p class="card-text d-flex justify-content-between">
                                    <small class="text-muted">$'.$product->price.'</small>
                                    <a href="?menu=detail&product='.$product->id.'&add=true" class="btn '.$btn.'" style="'.$disabled.'">
                                        <i class="fa-solid fa-cart-shopping"></i>+
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';

    if (isset($_GET["product"]) && isset($_GET["add"])) {
        addCart($_GET["product"]);
    }

    function addCart($product_id) {
        require_once('Models/crudCart.php');

        $user = $_SESSION['user'];
        $crud = new CrudCart();
        $cart = $crud->addCart($user, $product_id);
        if (isset($cart)) {
            header('Location: /my_shop?menu=cart');
            exit();
        }
        header('Location: /my_shop?menu=404');
        exit();
    }
?>