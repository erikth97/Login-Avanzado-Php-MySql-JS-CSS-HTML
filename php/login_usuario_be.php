<?php

include 'conexion_be.php';

$email = $_POST['email'];
$password = $_POST['password'];

// Encriptar la contraseña ingresada
$password_encriptada = password_hash($password, PASSWORD_DEFAULT);

$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email='$email' ");

if(mysqli_num_rows($validar_login) > 0){
    $usuario = mysqli_fetch_assoc($validar_login);
    // Verificar que la contraseña ingresada coincide con la almacenada en la base de datos
    if (password_verify($password, $usuario['password'])) {
        header("location: ../bienvenida.php");
        exit;
    } else {
        echo '
            <script>
            alert("Contraseña incorrecta, verifique los datos");
            window.location = "../index.php";
            </script>
        ';
        exit;
    }
}else{
    echo '
        <script>
        alert("Usuario no existe, verifique los datos");
        window.location = "../index.php";
        </script>
    ';
    exit;
}


?>
