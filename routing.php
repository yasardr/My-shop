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
			case 'detail':
				require_once('Products/detail.php');
				break;
			case 'cart':
				require_once('Cart/index.php');
				break;
			case 'simulation':
				require_once('Simulation/index.php');
				break;
			default:
				require_once('Layouts/notFound.php');
				break;
		}
	} else {
		require_once('Layouts/welcome.php');
	}
?>