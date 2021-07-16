<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<?php
session_start();

if($_COOKIE['usuario']) {
    $_SESSION['usuario'] = $_COOKIE['usuario'];
}

if(!$_SESSION['usuario']) {
     header('Location: login.php');
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
                <a class="navbar-brand" href="#page-top">Projeto CRUD</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="logout.php">Sair</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#contact"><?= $_SESSION['usuario'] ?></a></li>
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
                       
                        <?php
                        if(count($_POST) > 0) {
                            $erros = [];

                            if(!filter_input(INPUT_POST, "nome")) {
                                $erros['nome'] = 'Nome é obrigatório';
                            }

                            if(filter_input(INPUT_POST, "nascimento")) {
                                $data = DateTime::createFromFormat(
                                'd/m/Y', $_POST['nascimento']);
                                if(!$data) {
                                    $erros['nascimento'] = 'Data deve estar no padrão dd/mm/aaaa';
                                }
                            }

                             if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                                $erros['email'] = 'Email inválido';
                             }

                             if(strlen($_POST['phone']) < 14) {
                                $erros['phone'] = 'Digite um telefone valido';
                             }

                             if(strlen($_POST['cpf']) < 14) {
                                $erros['cpf'] = 'Digite um CPF valido';
                            }

                            if(strlen($_POST['message']) < 14) {
                                $erros['message'] = 'Digite alguma informação';
                            }
                           
                            //se eu tiver alguma array de erro
                           if(count($_POST) > 0) {

                           }
                           

                        }
                        ?>
                        
                        <?php /* foreach($erros as $erro): ?>
                            <div class="alert alert-danger" role="alert">
                        <?= $erro ?>
                        </div>
                        <?php endforeach ?> */ ?>
                       
                       
                        <br>
                        <form action="#" method="post" id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- NOME input-->
                            <div class="form-floating mb-3">
                                <input class="form-control <?= $erros['nome'] ? 'is-invalid' : ''?>" id="name" name="nome" type="text" placeholder="Enter your name..." data-sb-validations="required" 
                                value="<?= $_POST['nome'] ?>"/>
                                <label for="name">Nome Completo</label>
                                <div class="invalid-feedback"<?= $erros['nome']?> data-sb-feedback="name:required">Campo de nome Obrigatório!</div>
                            </div>
                            <!-- DtNascimento input-->
                            <div class="form-floating mb-3">
                            <script src="js/validardata.js"></script>
                                <input  class="form-control <?= $erros['nascimento'] ? 'is-invalid' : ''?>" type="text" name="nascimento" id="nascimento" maxlength="10" onkeypress="mascaraData(this)" placeholder="Nascimento" 
                                data-sb-validations="required" value="<?= $_POST['nascimento'] ?>" />
                                   
                                <label for="nascimento">Data de Nascimento</label>
                                <div class="invalid-feedback"<?= $erros['nascimento']?> data-sb-feedback="nascimento:required">Digite uma Data de nascimento Válida</div>
                            </div>
                            <!-- ENDEREÇO DE EMAIL input-->
                            <div class="form-floating mb-3">
                                <input class="form-control <?= $erros['email'] ? 'is-invalid' : ''?>" id="email" name="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" 
                                value="<?= $_POST['email'] ?>" />
                                <label for="email">Edereço de Email</label>
                                <div class="invalid-feedback"<?= $erros['email']?> data-sb-feedback="email:required">Digite um email válido.</div>
                              
                            </div>
                            <!-- TELEFONE input-->
                            <div class="form-floating mb-3">
                            <script src="js/validarphone.js"></script>
                            <input class="form-control <?= $erros['phone'] ? 'is-invalid' : ''?>"  id="phone" name="phone" onkeypress="mascara(this, telefone)" maxlength="15" placeholder="(__) _____-____" type="text" data-sb-validations="required" 
                            value="<?= $_POST['phone'] ?>" />
                                <label for="phone">Telefone</label>
                                <div class="invalid-feedback"<?= $erros['phone']?> data-sb-feedback="phone:required">Digite um número de telefone válido com DDD.</div>
                            </div>

                            <!-- CPF input-->
                            <div class="form-floating mb-3">
                            <script src="js/validarcpf.js"></script>
                                <input class="form-control <?= $erros['cpf'] ? 'is-invalid' : ''?>" id="cpf" type="text" onkeydown="javascript: fMasc( this, mCPF );" placeholder="Ex.: 000.000.000-00" maxlength="14" name="cpf" data-sb-validations="required"  
                                value="<?= $_POST['cpf'] ?>"/>
                                
                                <label for="cpf">CPF</label>
                                <div class="invalid-feedback"<?= $erros['cpf']?> data-sb-feedback="RegraValida:required">Digite um CPF válido.</div>
                            </div>
                           
                            
                             <!-- Message input-->
                             <div class="form-floating mb-3">
                                <textarea class="form-control <?= $erros['message'] ? 'is-invalid' : ''?>" id="message" name="message" type="text" maxlength="180" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"
                                value="<?= $_POST['message'] ?>"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback"<?= $erros['message']?> data-sb-feedback="message:required">Digite alguma mensagem.</div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Botão enviar vs1  --> 
                            <button class="btn btn-primary btn-lg">Enviar</button> 
                            <!-- Submit Button 
                            <button class="btn btn-primary btn-xl disabled" id="submitButton" type="submit">Enviar</button> --> 
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Local</h4>
                        <p class="lead mb-0">
                            Rua endereço número, 123.
                            <br />
                            Duque de Caxias
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Redes Sociais</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                      
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">SOBRE O CRUD</h4>
                        <p class="lead mb-0">
                            Ainda não finalizado...
                         
                            
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; ProjetoCRUD 2021</small></div>
        </div>
       
      
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
