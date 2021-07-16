<?php
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

if($_POST['email']) {
    $usuarios = [
    [
        "nome" => "Alina Teres",
        "email" => "lania@gmail.com",
        "senha" => "123456",
    ],
     [
        "nome" => "Rhana Modena",
        "email" => "maninha@zmail.com",
        "senha" => "654321",
     ],
  ];

   foreach($usuarios as $usuario) {
       $emailValido = $email === $usuario['email'];
       $senhaValida = $senha === $usuario['senha'];

       if($emailValido && $senhaValida){
           $_SESSION['erros'] = null;
           $_SESSION['usuario'] = $usuario['nome'];
           $exp = time() + 60 * 60 * 24 * 30;
           setcookie('usuario', $usuario['nome'], $exp);
           header('Location: index.php');
       }
   }

   if(!$_SESSION['usuario']) {
       $_SESSION['erros'] = ['Usuário/Senha Inválido!'];
   }

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PROJETO CRUD</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">Acesso Projeto CRUD</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        
        <!-- Portfolio Section-->
       
        <!-- About Section-->
       
        <!-- Contact Section-->
        <section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"></h2>
                <!-- Icon Divider
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div> -->
                <!-- Contact Section Form-->
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <br>
                        <h3> Identifique-se</h3>
                        <br>
                        <?php if ($_SESSION['erros']): ?>
                            <div class="erros">
                                <?php foreach ($_SESSION['erros'] as $erro): ?>
                                    <p><?= $erro ?></p>
                                    <?php endforeach ?>
                                </div>
                          <?php endif?>
                          <form action="#" method="post"> 
                     
                      
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com"  />
                                <label for="email">E-mail</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">Digite um email</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email não é válido.</div>
                            </div>

        
                                   <div class="form-floating mb-3">
                                <input class="form-control" id="senha" name="senha" type="password" placeholder="Enter your name..."  />
                                <label for="senha">Senha</label>       
                                </div>
                                <button class="btn btn-primary btn-xl active">Entrar</button>
                           
                        </form>
                     
              
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Copyright Section-->

        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>-->
       
    </body>
</html>
