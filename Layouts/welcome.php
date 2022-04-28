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
        <img src="https://picsum.photos/200/300" alt="welcome">
    </div>
</div>
