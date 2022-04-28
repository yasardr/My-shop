<?php
	if (isset($_GET['menu'])) {
		if ($_GET['menu']=='registrar') {
			//require_once('Clientes/registrar.php');
		} else if ($_GET['menu']=='mostrar') {
			//require_once('Clientes/mostrar.php');
		}
	} else {
		require_once('Layouts/welcome.php');
	}
?>