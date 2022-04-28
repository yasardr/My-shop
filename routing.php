<?php 
	if (isset($_GET['menu'])) {
		switch ($_GET['menu']) {
			case 'login':
				require_once('Login/index.php');
				break;
			case 'register':
				require_once('Login/register.php');
				break;
			case 'products':
				require_once('Products/index.php');
				break;
			default:
				require_once('Layouts/notFound.php');
				break;
		}
	} else {
		require_once('Layouts/welcome.php');
	}
?>