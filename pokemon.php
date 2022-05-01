<?php

require_once 'database.php';


session_start();
  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT name, last_name, email FROM user WHERE Id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
      $data1 = $user['name'];
      $data2 = $user['last_name'];
      $data3 = $user['email'];
    }
  }else{
        
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/home_user_styles.css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="js/modernizr.custom.js"></script>
  <link rel="icon" href="img/icons/ash-user.ico">
  <title>Home user</title>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
  <div class="global_container">
      <div class="one_part">
          <nav id="menu" class="navbar navbar-default navbar-fixed-top">
            <div class="container">
              <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                      <button type="button" id="bar_icon" class="navbar-toggle collapsed" data-toggle="collapse"
                      data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span
                      class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

                      <a class="navbar-brand page-scroll" href="#page-top"><i id="user_icon"class="fa fa-user" style="font-size: 20px; margin-right: 10px ;"></i><?=  strtoupper($data1), ' ',strtoupper($data2) ?></a>
                  <!-- <a class="navbar-brand page-scroll" href="#page-top">App POKÉMON</a> -->
                  </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                      <li><a href="#page-top" class="page-scroll" >Home</a></li>
                      <li><a href="logout.php" class="page-scroll">Cerrar Sesion</a></li>
                    </ul>
                  </div>
                 
              <!-- /.navbar-collapse -->
            </div>
          <!-- /.container-fluid -->
          </nav>
      </div>
      <div class="title_btns">
            <h1>Haz click sobre el pokémon que quieras ver</h1>
            <hr>
      </div>
      <div class="two_part" id="contenido">
          
      
          
        
    
    
      </div>

      <div class="five_part">
         <div id="footer">
             <div class="container text-center">
                <div class="fnav">
                   <p>2022 - App Pokémon - Dilson Alexander Cruz Nivia - Copyright &copy;</p>
                </div>
         </div>
      </div>
  </div>

  
  <!-- ****************scripts para el funcionamiento de la pagina************* -->
  <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <!-- ************************SCRIPT APP POKEMON************************* -->
  <script type="text/javascript" src="js/apipokemon.js"></script>
</body>
</html>
   