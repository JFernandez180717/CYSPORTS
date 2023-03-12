<?php include_once '../lib/helpers.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Iniciar Sesion</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/cysports.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair Display" rel="stylesheet">
</head>
<body>
    <div id="wrapper" style="background-color: #bf7879">
        <div id="content-wrapper">
            <div class="container-fluid py-5">
                <div class="container py-4" style="width: 650px">
                    <div class="card o-hidden border-0 shadow-lg mx-auto my-2">
                        <div class="form-row">
                            <div class="col-md-12 text-center">
                                <h3 class="mb-1 mt-3 fuente-cysport" style="font-weight: bold; color: #bf7879">Iniciar Sesion</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="user" enctype="multipart/form-data" method="POST" action="<?php echo getUrl("Login", "Login", "validaLogin",false,true);?>">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <p class="mb-1 fuente-cysport" style="font-weight: bold; color: #bf7879">Usuario</p>
                                        <input type="text" name="usuario" class="form form-control" placeholder="Ingrese el usuario">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <p class="mb-1 mt-3 fuente-cysport" style="font-weight: bold; color: #bf7879">Contraseña</p>
                                        <input type="password" name="password" class="form form-control" placeholder="Ingrese la contraseña">
                                    </div>
                                </div>
                                <br>                                
                                <div class="form-row">
                                    <div class="col-md-12" style="text-align: center;">
                                        <button type="submit" class="btn btn-cysports btn-user">
                                            <i class="fas fa-save"></i>
                                            Iniciar Sesion
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--?php include_once '../View/partes/footer.php' ?-->
        </div>
    </div>
    <footer class="footer-login">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span class="fuente-cysport" style="font-weight: bold; color: #bf7879">Copyright © CY SPORTS 2023</span>
          </div>
        </div>
    </footer>
</body>
</html>