<div class="row justify-content-md-center mt-3">
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <h3>Iniciar sesión</h3>
                </div>
                <form action="Controller/login.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Usuario</label>
                        <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" require>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" require>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>