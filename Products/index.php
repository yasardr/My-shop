<div class="row">
    <h2>Productos</h2>
</div>

<?php
    require_once('Models/crudProduct.php');

    $crud = new CrudProduct();
    $products = $crud->getProducts();

    echo '<div class="row">';
    foreach ($products as $key => $product) {
        $ref = isset($_SESSION['user']) ? '?menu=detail&product='.$product->id : '?menu=login';
        echo '
            <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
                <a class="container-product" href="'.$ref.'">
                    <div class="card container-product">
                        <div class="container-image">
                            <img src="'.$product->url_image.'" class="card-img-top img-product" alt="img">
                        </div>
                        <div class="card-body">
                            <span class="card-title d-flex justify-content-between">
                                <h5 class="text-truncate">'.$product->name.'</h5>
                                <small>$'.$product->price.'</small>
                            </span>
                            <small class="card-text stock-product">
                                Cantidad: '.$product->stock.'
                            </small>
                            <p class="card-text">
                                '.$product->description.'
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        ';
    }
    echo '</div>';
?>