<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Actualización Lista Precios</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">


                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body   ">
                        <!-- Nested Row within Card Body -->
                        
                                <div class="p-5">
                                    <div class="text-center">
                                    <h4 class="center h6 text-sucess mb-4">Hola, busca la calidad</h4>
                                    <div class="form-group">
                                    <form action="../php/conexion.php" method="POST" id="buscaCalidadEliminar">
                                    <div class="form-group">
                                        <!--wqmdendinendi-->
                                        <select class="form-control form-control-user" id="calidad" name="calidad">
                                            <?php 
                                            try{
                                            $serverName = "192.168.1.5";
                                            $connectionInfo = array( "Database"=>"V6INTER", "UID"=>"sa", "PWD"=>"Int3r_Cart0n.");
                                            $conn = sqlsrv_connect( $serverName, $connectionInfo );
                                        }catch(Exception $e) {
                                            echo "<script>console.log('<?php $e->getMessage() ?>')</script>"; 
                                        }
                                        if( $conn === false ) {
                                            echo "<script>console.log( <?php die( print_r( sqlsrv_errors(), true)) ?>)</script>";
                                       }
                                            
                                            $sql = "select Calidad from  ListaPreciosInter Group by Calidad order by Calidad ";
                                            $stmt = sqlsrv_query( $conn, $sql );?>
                                            <option selected="select">Selecciona Calidad que deseas eliminar</option>
                                           <?php while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {?>
                                             <option ><?php echo $row["Calidad"]?></option>
                                             <?php }  ?>
                                            </select>
                                        </div>
                                      <button class="btn btn-primary btn-user btn-block" type="submit" name="buscaCalidadEliminar" form="buscaCalidadEliminar">
                                            Buscar
                                        </button>
                                        <div class="text-center">
                                        <a class="small" href="../index.php">Regresar al menú principal</a>
                                    </div>
                                    </form>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

        </div>
        
    </div>
    
   <!-- Bootstrap core JavaScript-->
   <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>
