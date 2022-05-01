<?php
 
 include('database_two.php');
 session_start();
 $messageS = '';
 $messageE = '';
 if (isset($_POST['register'])) {
  
     $username = $_POST['name'];
     $last_name = $_POST['last_name'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $password_hash = password_hash($password, PASSWORD_BCRYPT);
  
     $query = $connection->prepare("SELECT * FROM user WHERE email=:email");
     $query->bindParam("email", $email, PDO::PARAM_STR);
     $query->execute();
  
     if ($query->rowCount() > 0) {
      $messageE = 'El email ya se encuentra registrado';
     }
  
     if ($query->rowCount() == 0) {
         $query = $connection->prepare("INSERT INTO user(name,last_name,email,password,id_type) VALUES (:username, :last_name, :email, :password_hash, 1)");
         $query->bindParam("username", $username, PDO::PARAM_STR);
         $query->bindParam("last_name", $last_name, PDO::PARAM_STR);
         $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
         $query->bindParam("email", $email, PDO::PARAM_STR);
         $result = $query->execute();
  
         if ($result) {
            $messageS = 'Usuario creado correctamente';
         } else {
            $messageE = 'Hubo un error al crear la cuenta, por favor intentelo de nuevo más tarde';
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
    <title>Registrarse</title>

</head>

<body >
    <!-- CABECERA-->

    <form  action="signup.php" method="post" class="form-box  animate__animated animate__fadeInUp">
    <?php if (!empty($messageS)):  ?> 
    <div class="alert alert-success alert-dismissible fade show">
        <strong><?= $messageS?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>
    <?php if (!empty($messageE)):  ?> 
    <div class="alert alert-danger alert-dismissible fade show">
        <strong>¡ERROR! </strong><?= $messageE?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
        <h1 class="form-title">Registro usuario nuevo</h1>
       <br>
       <input class="login_box" type="text" name="name" class="form__input" placeholder="&#128100; Ingresa tú nombre" required>
       <br>
       <input class="login_box" type="text" name="last_name" class="form__input" placeholder="&#128100; Ingresa tú apellido"requiered>
       <br>
        <input class="login_box" name="email" type="email" placeholder="&#128231; Enter your email" required>
        <br>
        <input class="login_box" name="password" type="password" placeholder="&#128274; Ingresa tú contraseña"required>
        <br>
        <!-- <input class="login_box" name="confirm_password" type="password" placeholder="&#128274; Confirma tú contraseña"required>
        <br> -->
        <input class="login_box" type="submit" name="register" value="Registrarse">
        <p class="frase">¿Ya tienes cuenta?<br><a href="login.php" class="botones_de_inicio">Iniciar sesion</a></p>
</form>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">
    
</script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" ></script>
</body>
</html>

