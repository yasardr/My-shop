<div class="row justify-content-md-center mt-3">
    <div class="col-sm-12 col-md-10">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <h3>Registro</h3>
                </div>
                <form class="row" action="Controller/register.php" method="post">
                    <div class="mb-3 col-12 col-md-4">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control" id="name" require>
                    </div>
                    <div class="mb-3 col-12 col-md-4">
                        <label for="lastname" class="form-label">Apellido</label>
                        <input type="text" name="lastname" class="form-control" id="lastname" require>
                    </div>
                    <div class="mb-3 col-12 col-md-4">
                        <label for="birthday" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" name="birthday" class="form-control" id="birthday" require>
                    </div>
                    <div class="mb-3 col-12 col-md-4">
                        <label for="telephone" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" id="telephone" name="telephone" require>
                    </div>
                    <div class="mb-3 col-12 col-md-4">
                        <label for="email" class="form-label">Correo</label>
                        <input type="email" name="email" class="form-control" id="email" require>
                    </div>
                    <div class="mb-3 col-12 col-md-4">
                        <label for="username" class="form-label">Usuario</label>
                        <input type="text" name="username" class="form-control" id="username" require>
                    </div>
                    <div class="mb-3 col-12 col-md-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control" id="password" require>
                    </div>
                    <div class="col-12 col-md-4"></div>
                    <div class="col-12 col-md-4"></div>
                    <div class="col-12">
                        <h5>Dirección</h5>
                    </div>
                    <div class="mb-3 col-12 col-md-4">
                        <label for="street" class="form-label">Calle o Avenida</label>
                        <input type="text" name="street" class="form-control" id="street" require>
                    </div>
                    <div class="mb-3 col-12 col-md-4">
                        <label for="state" class="form-label">Estado</label>
                        <input type="text" name="state" class="form-control" id="state" require>
                    </div>
                    <div class="mb-3 col-12 col-md-4">
                        <label for="country" class="form-label">País</label>
                        <input type="text" name="country" class="form-control" id="country" require>
                    </div>
                    <div class="mb-3 col-12 col-md-4">
                        <label for="zip_code" class="form-label">C.P.</label>
                        <input type="number" name="zip_code" class="form-control" id="zip_code" require>
                    </div>
                    <div class="mb-3 col-12 col-md-4">
                        <label for="reference" class="form-label">Referencia (Opcional)</label>
                        <input type="text" name="reference" class="form-control" id="reference" require>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Acceder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>