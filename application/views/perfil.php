<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Khmer&family=Konkhmer+Sleokchher&family=Suez+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="/Punto_Venta/style_perfil.css">
</head>

<body>
    <!-- Barra de navegación -->
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-md cont_logo">
                    <a aria-current="page" href="/Punto_Venta"><img class="logo text-white" src="imagenes/cytisum.png"
                            alt="Logo Cytisum"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link text-white" aria-current="page" href="#">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/Punto_Venta/#linkbeneficio">Beneficios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#planes">Planes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#contactoo">Contacto</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link text-white" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img class="login" id="iconoLogin" src="imagenes/lgin.png" alt="Icono de login">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item " data-bs-toggle="modal"
                                            data-bs-target="#loginModal">Iniciar sesión</a>
                                    </li>
                                    <li><a class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#crearCuentaModal">Crear cuenta</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Modal de Iniciar Sesión -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Iniciar sesión</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="login-container">
                        <div class="sesion_log">
                            <div class="logi">
                                <div class="circu">
                                    <div class="text-center">
                                        <img src="imagenes/log.png" class="img_cytisumLogin" alt="Logo Cytisum">
                                    </div>
                                </div>
                                <div class="mover">
                                    <p class="sesion">Iniciar sesión</p>
                                    <?php if (isset($_GET['error'])): ?>
                                        <p>Datos invalidos</p>
                                    <?php endif; ?>
                                    <form id="inicioForm" method="POST">
                                        <div class="mb-3 con">
                                            <input type="text" class="form-control inicio_sesion" name="usuario" id="usuario"
                                                placeholder="Usuario">
                                        </div>
                                        <div class="mb-3 con">
                                            <input type="password" class="form-control inicio_sesion" name="contraseña" id="contrasena" placeholder="Contraseña">
                                        </div>
                                        <div class="mb-3 text-center">
                                            <a href="#" class="contra">¿Olvidaste tu contraseña?</a>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary ingresar">Ingresar</button>
                                        </div>
                                    </form>
                                    <div class="footer-links mt-3">
                                        <p>¿No tienes cuenta? <a href="#" data-bs-toggle="modal" data-bs-target="#crearCuentaModal">Crear
                                                una cuenta</a></p>
                                        <p><a href="#">Aviso de privacidad</a> | <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#perfilModal">Términos y condiciones</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#inicioForm').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "<?php echo base_url('iniciar_sesion'); ?>",
                    method: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        if (response.status === 'success') {
                            alert(response.message);
                            location.reload();
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error de AJAX:', error);
                        console.error('Detalles del error:', xhr.responseText);
                        alert('Ocurrió un error al procesar la solicitud.', error);
                    }
                });
            });
            // evento click para cerrar sesión
            $('#logout_button').on('click', function() {
                logout(); // Llamamos a la función logout cuando se haga click
            });
        });

        // Función para cerrar sesión
        function logout() {
            $.ajax({
                url: "<?php echo base_url('cerrar_sesion'); ?>", // Ruta para cerrar sesión
                method: "POST",
                dataType: "json",
                success: function(response) {
                    console.log('Respuesta del servidor:', response);
                    if (response.status === 'success') {
                        window.location.reload(); // Recargar la página
                    } else {
                        alert('Hubo un problema al cerrar la sesión' + response.message); // Mostrar alerta si hay error
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error de AJAX:', error);
                    alert('Hubo un error en ajax al procesar el cerrar sesión' + xhr.responseText); // Mostrar alerta de error
                }
            });
        }
    </script>

    <!-- Modal para Crear Cuenta -->
    <div class="modal fade" id="crearCuentaModal" tabindex="-1" aria-labelledby="crearCuentaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal_cuenta">
            <div class="modal-content cuenta_cont">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearCuentaModalLabel">Crear Cuenta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="custom-container">
                        <div class="distancia">
                            <div class="relleno">
                                <div class="informacion"></div>
                                <div class="text-center">
                                    <img src="imagenes/log.png" class="img" alt="Logo Cytisum">
                                </div>
                                <form class="cont" id="registroForm">
                                    <p class="infocue">Información de su cuenta</p>
                                    <div class="row mb-3 control_cuenta">
                                        <div class="col">
                                            <label for="nombre" class="form-label lb_cuenta">Nombre(s)</label>
                                            <input type="text" class="form-control cr_cuenta" id="registro_nombre"
                                                name="registro_nombre" placeholder="Nombre">
                                        </div>
                                        <div class="col">
                                            <label for="apellido" class="form-label lb_cuenta">Apellidos</label>
                                            <input type="text" class="form-control cr_cuenta" id="registro_apellido"
                                                name="registro_apellido" placeholder="Apellido">
                                        </div>
                                    </div>
                                    <div class="row mb-3 control_cuenta">
                                        <div class="col">
                                            <label for="correo" class="form-label lb_cuenta">Correo electrónico</label>
                                            <input type="email" class="form-control cr_cuenta" id="registro_correo"
                                                name="registro_correo" placeholder="Gmail">
                                        </div>
                                        <div class="col">
                                            <label for="telefono" class="form-label lb_cuenta">Teléfono</label>
                                            <input type="text" class="form-control cr_cuenta" id="registro_telefono"
                                                name="registro_telefono" placeholder="Teléfono">
                                        </div>
                                    </div>
                                    <p class="infocue">Información de acceso</p>
                                    <div class="row mb-3 control_cuenta">
                                        <div class="col">
                                            <label for="usuario" class="form-label lb_cuenta">Usuario</label>
                                            <input type="text" class="form-control cr_cuenta" id="registro_usuario"
                                                name="registro_usuario" placeholder="Usuario">
                                        </div>
                                        <div class="col">
                                            <label for="contrasena" class="form-label lb_cuenta">Contraseña</label>
                                            <input type="password" name="registro_contrasena"
                                                class="form-control cr_cuenta password1" placeholder="Contraseña">
                                            <span class="fa fa-fw fa-eye password-icon show-password"></span>
                                        </div>
                                        <div class="col">
                                            <label for="repcontrasena" class="form-label lb_cuenta">Repetir
                                                contraseña</label>
                                            <input type="password" name="rep_contrasena"
                                                class="form-control cr_cuenta password2"
                                                placeholder="Repetir contraseña">
                                            <span class="fa fa-fw fa-eye password-icon show-password2"></span>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary crear">CREAR CUENTA</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $('#registroForm').on('submit', function(e) {
                e.preventDefault(); // Evita recargar la pagina

                // Obtiene los datos del formulario
                var formData = $(this).serialize(); // Datos formulario

                $.ajax({
                    url: "<?php echo base_url('registrarse'); ?>", // URL donde se enviarán los datos
                    type: "POST",
                    data: formData,
                    dataType: "json", //respuesta en formato JSON
                    success: function(response) {

                        if (response.status == 'success') {

                            //$('.informacion').html('<div class="alert alert-success">' + response.message + '</div>');
                            $('#registroForm')[0].reset(); // vaciar los input
                            $('#crearCuentaModal').modal('hide'); // Cerrar el modal
                            alert(response.message);
                        } else {
                            // Si hay errores, muestra los errores
                            console.log(response.message);
                            $('.informacion').html('<div class="alert alert-danger">' + response.message + '</div>');
                            // alert(response.message);
                        }
                        setTimeout(function() {
                            $('.informacion').html('');
                        }, 2000);
                    },
                    error: function(xhr, status, error) {
                        // Error en la solicitud AJAX
                        console.error('Hubo un error:', error);
                        console.error('Detalles del error', xhr.responseText);
                        $('.informacion').html('<div class="alert alert-danger">Ocurrió un error inesperado.</div>' + xhr.responseText);
                        //$('.informacion').
                    }
                });
            });
        });
    </script>

    <!-- Perfil del usuario -->
    <div class="container mt-3">
        <h2 class="titulo_perfil">Perfil</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="cuadro_perfil">
                    <form class="todito" method = "GET">
                        <div class="form-row align-items-center mb-3">
                            <div class="col-4">
                                <label for="usuario" class="lis">Usuario</label>
                            </div>
                            <div class="col-8">
                                <div class="este">
                                    <input type="text" class="form-control" id="usuario1" placeholder="Usuario" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-row align-items-center mb-3">
                            <div class="col-4">
                                <label for="contrasenaa" class="lis">Contraseña</label>
                            </div>
                            <div class="col-8">
                                <div class="este">
                                    <input type="password" name="password" class="form-control password3"
                                        id="contraseña" placeholder="Contraseña" disabled>
                                    <span class="fa fa-fw fa-eye password-icon show-password3" style="padding-top: 5px;"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row align-items-center mb-3">
                            <div class="col-4">
                                <label for="telefono" class="lis">Teléfono</label>
                            </div>
                            <div class="col-8">
                                <div class="este">
                                    <input type="text" class="form-control" id="telefono" placeholder="xxx xxx xxxx"
                                        disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-row align-items-center mb-3">
                            <div class="col-4">
                                <label for="correo" class="lis">Correo</label>
                            </div>
                            <div class="col-8">
                                <div class="este">
                                    <input type="email" class="form-control" id="correo" placeholder="cytisum@gmail.com"
                                        disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-row align-items-center mb-3">
                            <div class="col-4">
                                <label for="empresa" class="lis">Empresa</label>
                            </div>
                            <div class="col-8">
                                <div class="este">
                                    <input type="text" class="form-control" id="empresa"
                                        placeholder="Nombre de la empresa" disabled>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 offset-md-1">
                <div class=" text-center">
                    <img src="img/perfil.png" class="foto-perfil" alt="Foto para perfil">
                </div>
                    <h4 id="nombre3" class="jorge"><?php echo $nombre_usuario; ?></h4>
                    <h4 id="apellido3" class="jorge">Apellidos</h4>
                <div class="botones">
                    <div class="text-center">
                        <a class="btn btn-primary editarb" href="/Punto_Venta/editar_perfil"> Editar</a>
                    </div><br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary editar">Cerrar sesion</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Script para la funcion del ojo en la Contraseña -->
    <script>
        window.addEventListener("load", function() {
            showPassword = document.querySelector('.show-password');
            showPassword.addEventListener('click', () => {
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
        window.addEventListener("load", function() {
            showPassword2 = document.querySelector('.show-password2');
            showPassword2.addEventListener('click', () => {
                password2 = document.querySelector('.password2');
                if (password2.type === "text") {
                    password2.type = "password";
                    showPassword.classList.remove('fa-eye-slash');
                } else {
                    password2.type = "text";
                    showPassword2.classList.toggle("fa-eye-slash");
                }
            });
        });
        window.addEventListener("load", function() {
            showPassword3 = document.querySelector('.show-password3');
            showPassword3.addEventListener('click', () => {
                password3 = document.querySelector('.password3');
                if (password3.type === "text") {
                    password3.type = "password";
                    showPassword3.classList.remove('fa-eye-slash');
                } else {
                    password3.type = "text";
                    showPassword3.classList.toggle("fa-eye-slash");
                }
            });
        });
    </script>

    <!-- Script específico para cargar datos del perfil -->
    <script>
        $(document).ready(function() {
            $.ajax({
                url: "<?php echo base_url('obtener_perfil'); ?>",
                method: "GET",
                dataType: "json",
                success: function(response) {
                    if (response.status === 'success') {
                        const datos = response.data[0]; // Medoo devuelve un arreglo, tomamos el primer elemento
                        $('#usuario1').val(datos.usuario);
                        $('#contraseña').val(datos.contraseña); // Si decides mostrarla (en texto cifrado, si es necesario)
                        $('#telefono').val(datos.telefono);
                        $('#correo').val(datos.correo);
                        $('#empresa').val(datos.nombre_empresa || ''); // Maneja si no hay empresa
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error de AJAX:', error);
                    console.error('Detalles del error:', xhr.responseText);
                    alert('Ocurrió un error al obtener los datos del perfil.');
                }
            });
        });
    </script>

    <!-- Script específico para cargar nombre del usuario en el perfil -->
    <script>
        $(document).ready(function () {
            $.ajax({
                url: "<?php echo base_url('nombre'); ?>", // Asegúrate de que esta ruta sea correcta
                method: 'GET',
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                        const datos = response.data; // La respuesta debe ser un objeto con nombre y apellido
                        $('#nombre3').text(datos.nombre);
                        $('#apellido3').text(datos.apellido);
                    } else {
                        console.error('Error:', response.message);
                        $('#nombre3').text('Error al cargar datos');
                        $('#apellido3').text('Error al cargar datos');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error de AJAX:', error);
                    console.error('Detalles del error:', xhr.responseText);
                    alert('Ocurrió un error al obtener el nombre del usuario.');
                }
            });
        });
    </script>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>