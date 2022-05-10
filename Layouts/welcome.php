<div class="row">
    <?php
        if (isset($_SESSION['user'])) {
            echo '
                <div class="col-12">
                    <h3>Bienvenido '.$_SESSION["user"]->name.' '.$_SESSION["user"]->lastname.'!</h3>
                </div>
            ';
        }
    ?>
    <div class="col-12 d-flex justify-content-center">
        <img width="400" src="https://upload.wikimedia.org/wikipedia/commons/e/e3/Logo_vector.png" alt="welcome">
    </div>
</div>
