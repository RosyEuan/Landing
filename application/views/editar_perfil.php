<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Khmer&family=Konkhmer+Sleokchher&family=Suez+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="/Punto_Venta/style_editarPerfil.css">
</head>
<body>
<!-- Barra de navegación -->
<div class="container-fluid">
      <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container-md cont_logo">
            <a  aria-current="page" href="#"><img class="logo text-white" src="imagenes/cytisum.png" alt="Logo Cytisum"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a class="nav-link text-white" aria-current="page" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#linkbeneficio">Beneficios</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#planes">Planes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#contactoo">Contacto</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="login" id="iconoLogin" src="imagenes/lgin.png" alt="Icono de login">
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item " data-bs-toggle="modal" data-bs-target="#loginModal">Iniciar sesión</a>
                  </li>
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#crearCuentaModal">Crear cuenta</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <!-- Editar perfil -->
    <div class="container mt-5">
        <h2 class="titulo">Perfil</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="cuadre">
                    <form class="todeto">
                        <div class="form-row align-items-center mb-3">
                            <div class="col-4">
                                <label for="usuario"class="lisp" >Usuario</label>
                            </div>
                            <div class="col-8">
                                <div class="oeste">
                                    <input type="text" class="form-control" id="usuario" placeholder="Usuario">
                                </div>
                            </div>
                        </div>
                        <div class="form-row align-items-center mb-3">
                            <div class="col-4">
                                <label for="contrasena"class="lisp">Contraseña</label>
                            </div>
                            <div class="col-8">
                                <div class="oeste">
                                    <input type="password" name="password" class="form-control password1" placeholder="Contraseña">
                                    <span class="fa fa-fw fa-eye password-icon show-password"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row align-items-center mb-3">
                            <div class="col-4">
                                <label for="telefono"class="lisp">Teléfono</label>
                            </div>
                            <div class="col-8">
                                <div class="oeste">
                                    <input type="text" class="form-control" id="telefono" placeholder="xxx xxx xxxx">
                                </div>
                            </div>
                        </div>
                        <div class="form-row align-items-center mb-3">
                            <div class="col-4">
                                <label for="correo"class="lisp">Correo</label>
                            </div>
                            <div class="col-8">
                                <div class="oeste">
                                    <input type="email" class="form-control" id="correo" placeholder="cytisum@gmail.com">
                                </div>
                            </div>
                        </div>
                        <div class="form-row align-items-center mb-3">
                            <div class="col-4">
                                <label for="empresa"class="lisp">Empresa</label>
                            </div>
                            <div class="col-8">
                                <div class="oeste">
                                    <input type="text" class="form-control" id="empresa" placeholder="Nombre de la empresa">
                                </div>
                            </div>
                        </div>
                        <div class="guardar">
                            <button type="submit" class="btn btn-primary bot">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 offset-md-1">
                <div class=" text-center">
                    <img src="img/perfil.png" class="foto-perfil" alt="Foto de perfil">
                </div>
                <h4 class="jorga">Nombres<br>Apellidos</h4>
            </div>
        </div>
    </div>

    <!-- Script para la funcion del ojo en la Contraseña -->
    <script>
        window.addEventListener("load", function() {
            // Icono para mostrar/ocultar contraseña
            showPassword = document.querySelector('.show-password');
            showPassword.addEventListener('click', () => {
                // Input de tipo password
                password1 = document.querySelector('.password1');
                if (password1.type === "text") {
                    password1.type = "password";
                    showPassword.classList.remove('fa-eye-slash');
                } else {
                    password1.type = "text";
                    showPassword.classList.toggle("fa-eye-slash");
                }
            });
        });
    </script>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>  
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
