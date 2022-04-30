<?php
	session_start();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
		<a class="navbar-brand" href="/my_shop">Shya</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="/my_shop">Principal</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="?menu=products">Productos</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="fa-solid fa-user text-white"></i>
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php 
							if (isset($_SESSION['user'])) {
								echo '
									<li>
										<a class="dropdown-item" href="/my_shop/Controller/logout.php">Cerrar sesión</a>
									</li>
								';
							} else {
								echo '
									<li><a class="dropdown-item" href="?menu=login">Iniciar sesión</a></li>
									<li><a class="dropdown-item" href="?menu=register">Registrarse</a></li>
								';
							}
						?>
					</ul>
				</li>
			</ul>
			<?php 
				if (isset($_SESSION['user'])) {
					echo '
						<a href="?menu=cart">
							<i class="fa-solid fa-cart-shopping text-white"></i>
						</a>
					';
				}
			?>
		</div>
	</div>
</nav>