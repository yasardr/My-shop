<?php
    session_start();
    $user = $_SESSION['user'];

    $text = "Acabas de realizar una compra de manera exitosa";

    mail($user->email, 'Compra exitosa', $text);

    header('Location: /my_shop');
?>