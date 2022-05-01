<?php
 
include('database_two.php');
session_start();
$messageE = '';
if (isset($_POST['login'])) {
 
    $username = $_POST['email'];
    $password = $_POST['password'];
 
    $query = $connection->prepare("SELECT * FROM user WHERE email=:email");
    $query->bindParam("email", $username, PDO::PARAM_STR);
    $query->execute();
 
    $result = $query->fetch(PDO::FETCH_ASSOC);
 
    if (!$result) {
      $messageE = 'El email o la contraseña son incorrectos';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['Id'];
            header('Location: pokemon.php');
        } else {
            $messageE = 'El email o la contraseña son incorrectos';
        }
    }
}
 
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Incio de sesión</title>

</head>

<body >
    <!-- CABECERA-->
    <div id="container_f">
        <form  action="login.php" method="post" class="form-box  animate__animated animate__fadeInUp">
        
            <?php if (!empty($messageE)):  ?> 
            <div class="alert alert-danger alert-dismissible fade show">
            <strong>¡Error! </strong><?= $messageE?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>
            <h1 class="form-title">Ingresa a tú cuenta</h1>
            <br>
            <input class="login_box" type="email" formcontrolname="user" name="email" placeholder="&#128231; Ingresa tú email" required>
            <br>
            <input class="login_box" type="password" formccontrole="password" role="textbox" name="password" placeholder="&#128274; Ingresa tú clave de usuario" required>
            <br>
            <input class="login_box_"type="submit" name="login"value="Iniciar Sesión">
            <p class="frase">¿Aun no tienes cuenta?<br><a href="signup.php" class="botones_de_inicio"> Registrase</a></p>
        
        

        </form>
    </div>
    
</body>
</html>