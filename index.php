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
                        <li class="nav-item mx-0 mx-lg-1" data-bs-toggle="modal" data-bs-target="#portfolioModal1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#contact">Membros Cadastrados</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        

        <!-- Masthead-->
        
        <!-- Portfolio Section-->
       
        <!-- About Section-->
       
        <!-- Validação retirada 001 -->
       
                     
                       
                        
                         <!-- Contact Section-->
        <section class="page-section" id="contact">
            <div class="container">
            <?php require_once 'db/processo.php'; ?>

<?php

  if (isset($_SESSION['message'])): ?>

  <div class="alert alert-<?=$_SESSION['msg_type']?>">
  

  <?php
  echo $_SESSION['message'];
  
  unset($_SESSION['message']);
?>

  </div>

  <?php endif ?>
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
                    
                       
                       
                        <br>
                        
                       
                       <form action="db/processo.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <!-- NOME input-->
                            <div class="form-floating mb-3">
                                <input type="text" name="nome" class="form-control" id="nome" placeholder="Enter your name..." data-sb-validations="required" 
                                value="<?php echo $nome; ?>"/>
                                <label for="nome">Nome Completo</label>
                                <div class="invalid-feedback" data-sb-feedback="nome:required">Campo de nome Obrigatório!</div>
                            </div>
                            <!-- DtNascimento input-->
                            <div class="form-floating mb-3">
                            <script src="js/validardata.js"></script>
                                <input  type="date" name="nascimento" class="form-control" id="nascimento" maxlength="14" placeholder="Entre com seu nascimento" 
                                data-sb-validations="nascimento:required" value="<?php echo $nascimento; ?>" />
                                   
                                <label for="nascimento">Data de Nascimento</label>
                                <div class="invalid-feedback" data-sb-feedback="nascimento:required">Digite uma Data de nascimento Válida</div>
                            </div>
                            <!-- ENDEREÇO DE EMAIL input-->
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" data-sb-validations="required,email" 
                                value="<?php echo $email; ?>" />
                                <label for="email">Edereço de Email</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">Digite um email válido.</div>
                              
                            </div>
                            

                             <!-- TELEFONE input-->
                            <div class="form-floating mb-3">
                            <script src="js/validarphone.js"></script>
                            <input type="text" name="phone" class="form-control"  id="phone" onkeypress="mascara(this, telefone)" maxlength="15" placeholder="(__) _____-____" data-sb-validations="required" 
                            value="<?php echo $phone; ?>" />
                                <label for="phone">Telefone</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">Digite um número de telefone válido com DDD.</div>
                            </div>

                            <!-- CPF input-->
                            <div class="form-floating mb-3">
                            <script src="js/validarcpf.js"></script>
                                <input type="text" name="cpf" class="form-control" id="cpf" onkeydown="javascript: fMasc( this, mCPF );" placeholder="Ex.: 000.000.000-00" maxlength="14" data-sb-validations="required"  
                                value="<?php echo $cpf; ?>"/>
                                
                                <label for="cpf">CPF</label>
                                <div class="invalid-feedback" data-sb-feedback="RegraValida:required">Digite um CPF válido.</div>
                            </div>
                           
                            
                             <!-- Message input-->
                             <div class="form-floating mb-3">
                                <textarea type="text" name="mensagem" class="form-control" id="mensagem" maxlength="180" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"
                                value="<?php echo $mensagem; ?>"><?php echo $mensagem; ?></textarea>
                                <label for="mensagem">Mensagem</label>
                                <div class="invalid-feedback" data-sb-feedback="mensagem:required">Digite alguma mensagem.</div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- Sbmmite completo, deixarei para qualquer outra alteração no botão de "enviar" -->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Envio realizado com sucesso!</div>
                                    
                                    <br />
                                    
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Botão enviar vs1  --> 
                           
                           <?php
                            if ($update == true):
                            ?>
                          
                        <button type="submit" class="btn btn-info btn-lg" name="update">Atualizar</button> 
                        <?php else: ?>
                        <button type="submit" class="btn btn-primary btn-lg" name="save">Enviar</button> 
                        <?php endif; ?>
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
                            Ainda não finalizado... Mas funcionando.
                         
                            
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; ProjetoCRUD 2021</small></div>
        </div>
       
         <!-- Portfolio Modal 1-->
         <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Membros</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image-->
                                    <?php require_once 'db/processo.php' ?>

                        <?php
                             $mysqli = new mysqli('127.0.0.1:3306', 'root', 'root', 'crud') or die(mysqli_error($mysqli));
                             $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);;
                             //pre_r($result);
                             //pre_r($result->fetch_assoc());
                             //pre_r($result->fetch_assoc());
                             ?>

                        <div class="row justify-content-center">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Data de Nascimento</th>
                                        <th>E-Mail</th>
                                        <th>Telefone</th>
                                        <th>CPF</th>
                                        <th>Mensagem</th>
                                        <th colspan="6">Action</th>

                                </tr>
                    </thead>
                    <?php
                    while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['nome']; ?></td>
                        <td><?php echo $row['nascimento']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['cpf']; ?></td>
                        <td><?php echo $row['mensagem']; ?></td>
                        <td>
                            

                   
                   
                    
                            <a href="index.php?edit=<?php echo $row['id']; ?>"
                               class="btn btn-info">Editar</a>
                  
                            <a href="db/processo.php?delete=<?php echo $row['id']; ?>"
                               class="btn btn-danger">Deletar</a>
                             
                        </td>
                       
                    </tr>
                    <?php endwhile; ?>
                    </table>              
                    </div>
 
                       <?php
                       function pre_r( $array ) {
                           echo '<pre>';
                           print_r($array);
                           echo '</pre>';
                       }
                       ?>
                                    
                                    <button class="btn btn-primary" href="#!" data-bs-dismiss="modal">
                                        <i class="fas fa-times fa-fw"></i>
                                        Fecha janela
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
  
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
