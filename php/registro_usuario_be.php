<?php
    include 'conexion_be.php';

    $nombre_completo = htmlspecialchars($_POST['nombre_completo'], ENT_QUOTES, 'UTF-8');
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $usuario = htmlspecialchars($_POST['usuario'], ENT_QUOTES, 'UTF-8');
    $password = $_POST['password'];

    // Validar los datos de entrada
    if (!$nombre_completo || !$email || !$usuario || !$password) {
        die("Error: Los datos de entrada no son válidos");
    }

    // Sanear los datos de entrada
    $nombre_completo = mysqli_real_escape_string($conexion, $nombre_completo);
    $email = mysqli_real_escape_string($conexion, $email);
    $usuario = mysqli_real_escape_string($conexion, $usuario);
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Verificar que el correo no se repita en la base de datos
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email='$email' ");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                alert("Este correo ya está registrado, intenta con otro");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }

    // Verificar que el usuario no se repita en la base de datos
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario' ");

    if(mysqli_num_rows($verificar_usuario) > 0){
        echo '
            <script>
                alert("Este usuario ya está registrado, intenta con otro");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }

    // Crear la consulta preparada
    $query = "INSERT INTO usuarios(nombre_completo, email, usuario, password)
            VALUES(?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $query);

    // Asignar los valores de los parámetros
    mysqli_stmt_bind_param($stmt, "ssss", $nombre_completo, $email, $usuario, $password);

    // Ejecutar la consulta preparada
    $ejecutar = mysqli_stmt_execute($stmt);

    if($ejecutar){
        echo '
            <script>
                alert("Usuario almacenado exitosamente");
                window.location = "../index.php";
            </script>
        ';    
    }else{
        echo '
            <script>
                alert("Inténtalo de nuevo, no almacenado");
                window.location = "../index.php";
            </script>
        ';
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
?>
