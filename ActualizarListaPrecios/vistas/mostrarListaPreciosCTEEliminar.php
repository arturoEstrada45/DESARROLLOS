<?php
$cte=$_REQUEST['cte'];
//header(‘Content-Type: text/html; charset=utf-8’);
/*
 select * from Cte

 select * from ListaPreciosCTEInter
*/ 


$serverName = "192.168.1.5";
$connectionInfo = array( "Database"=>"V6INTER", "UID"=>"sa", "PWD"=>"Int3r_Cart0n.");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
$sql = "SELECT * FROM  Cte WHERE Cliente='$cte'";
$stmt = sqlsrv_query( $conn, $sql );

 while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
   $cliente=$row['Cliente'];
   $nombre=$row["Nombre"];
   $listaDefinido=$row["ListaPreciosEsp"];
   $comentarios=$row["Comentarios"];
     } 

   




?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">  
<style>
        textarea {text-transform: uppercase;}
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Eliminar Lista Precios Completa</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
<script>
alert("Ten cuidado con los cambios que hagas");
</script>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

           <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Cliente <?php echo $cliente?></h1>
                                        <h1 class="h4 text-gray-900 mb-2">Nombre Cliente:</h1>
                                        <p class="mb-4"><?php echo $nombre ?></p>
                                        <h1 class="h4 text-gray-900 mb-2">Lista de precios definida:</h1>
                                        <p class="mb-4"><?php echo $listaDefinido ?></p>
                                        <h1 class="h4 text-gray-900 mb-2">Lista precios:</h1>
                                        
                                        <!--wqmdendinendi-->
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
                                            
                                       $sql = "SELECT ListaPrecios FROM  ListaPreciosCTEInter WHERE Cliente='$cte'";
                                            $stmt = sqlsrv_query( $conn, $sql );?>
                                           <?php while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {?>
                                            <p class="mb-4"><?php echo $row["ListaPrecios"]?></p>
                                             <?php }  ?>
                                            
                                       
                                             <h1 class="h4 text-gray-900 mb-2">Comentarios:</h1>
                                            <p class="mb-4"><?php echo $comentarios; ?></p>
                                        
                                    </div>
                                    
                                    <div class="text-center">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="text-gray-400"></i>
                                    Eliminar lista precios cliente
                                </a>
                                    </div>
                                
                                    <div class="text-center">
                                        <a class="small" href="../vistas/eliminarListaCompleta.php">Regresar a la busqueda</a>
                                    </div>
                                </div>
                    </div>
                </div>


        </div>
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar información lista precios</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="../php/conexion.php" method="POST" id="updateUser">
                <div class="form-group row">
                                    <p class="mb-4">¿Seguro que deseas eliminar todas las listas de precios del cliente <?php echo $cliente?>?</p>
                                    <input type="text" hidden class="form-control form-control-user" id="cte" name="cte" value="<?php echo $cliente?>" >
                                        </div> 
                    </form>
                
    </div>
                <div class="modal-footer"> 
                
                <button class="btn btn-warning" type="submit" name="eliminarListaCompleta" form="updateUser">Eliminar listas</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
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
