<?php

header('Content-Type: text/html; charset=UTF-8');

if (isset($_POST['busca'])){
    
$precio = $_POST['precio'];
$rama = $_POST['rama'];
$calidad = $_POST['calidad'];
$calibre = $_POST['calibre'];
$serverName = "192.168.1.5";
$connectionInfo = array( "Database"=>"V6INTER", "UID"=>"sa", "PWD"=>"Int3r_Cart0n.");
$conn = sqlsrv_connect( $serverName, $connectionInfo );
if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}



if($calibre=="Todos"){   
  $contador=0; 
$sql = "SELECT * FROM ListaPreciosInter where ListaPrecios='$precio' and Rama='$rama' and Calidad='$calidad'";
         
          $stmt = sqlsrv_query( $conn, $sql );
          $total=sqlsrv_num_rows($stmt);
          if( $stmt === false) {
              die( print_r( sqlsrv_errors(), true) );
          }
          
              while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                $contador=$contador+1;
            }
            if($contador>=1){
                header('location: ../vistas/muestraInfoAll.php?precio='.$precio.'&rama='.$rama.'&calidad='.$calidad);
            }
            else {
                header('location: ../vistas/eliminarPDF1.php');
            }

}
else{
    $contador=0; 
$sql = "SELECT * FROM ListaPreciosInter where ListaPrecios='$precio' and Rama='$rama' and Calidad='$calidad' and Calibre='$calibre'";
         
          $stmt = sqlsrv_query( $conn, $sql );
          $total=sqlsrv_num_rows($stmt);
          if( $stmt === false) {
              die( print_r( sqlsrv_errors(), true) );
          }
          
              while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                $contador=$contador+1;
            }
            if($contador>=1){
                header('location: ../vistas/muestraInfo.php?precio='.$precio.'&rama='.$rama.'&calidad='.$calidad.'&calibre='.$calibre);
            }
            else {
                header('location: ../vistas/eliminarPDF1.php');
            }



}


}


else if (isset($_POST['buscaMov'])){
    
    $precio = $_POST['precio'];
    $articulo = $_POST['articulo'];
    $serverName = "192.168.1.5";
    $connectionInfo = array( "Database"=>"V6INTER", "UID"=>"sa", "PWD"=>"Int3r_Cart0n.");
    $conn = sqlsrv_connect( $serverName, $connectionInfo );
    if( $conn === false ) {
        die( print_r( sqlsrv_errors(), true));
    }
    

        $contador=0; 
    $sql = "SELECT * FROM ListaPreciosD WHERE lista='$precio' AND Articulo='$articulo'";
             
              $stmt = sqlsrv_query( $conn, $sql );
              $total=sqlsrv_num_rows($stmt);
              if( $stmt === false) {
                  die( print_r( sqlsrv_errors(), true) );
              }
              
                  while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                    $contador=$contador+1;
                }
                if($contador>=1){
                    header('location: ../vistas/muestraInfoMov.php?precio='.$precio.'&articulo='.$articulo);
                }
                else {
                    header('location: ../vistas/eliminarMov1.php');
                }
    
    }

    
    else if (isset($_POST['buscaCTE'])){
    
        $cte = $_POST['cte'];
        $serverName = "192.168.1.5";
        $connectionInfo = array( "Database"=>"V6INTER", "UID"=>"sa", "PWD"=>"Int3r_Cart0n.");
        $conn = sqlsrv_connect( $serverName, $connectionInfo );
        if( $conn === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        
    
            $contador=0; 
        $sql = "SELECT * FROM Cte WHERE Cliente='$cte'";
                 
                  $stmt = sqlsrv_query( $conn, $sql );
                  $total=sqlsrv_num_rows($stmt);
                  if( $stmt === false) {
                      die( print_r( sqlsrv_errors(), true) );
                  }
                  
                      while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                        $contador=$contador+1;
                    }
                    if($contador>=1){
                        header('location: ../vistas/mostrarListaPreciosCTE.php?cte='.$cte);
                    }
                    else {
                        header('location: ../vistas/eliminarMov1.php');
                    }
        
        }  


        else if (isset($_POST['buscaCTEEliminar'])){
    
            $cte = $_POST['cte'];
            $serverName = "192.168.1.5";
            $connectionInfo = array( "Database"=>"V6INTER", "UID"=>"sa", "PWD"=>"Int3r_Cart0n.");
            $conn = sqlsrv_connect( $serverName, $connectionInfo );
            if( $conn === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
            
        
                $contador=0; 
            $sql = "SELECT * FROM Cte WHERE Cliente='$cte'";
                     
                      $stmt = sqlsrv_query( $conn, $sql );
                      $total=sqlsrv_num_rows($stmt);
                      if( $stmt === false) {
                          die( print_r( sqlsrv_errors(), true) );
                      }
                      
                          while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                            $contador=$contador+1;
                        }
                        if($contador>=1){
                            header('location: ../vistas/mostrarListaPreciosCTEEliminar.php?cte='.$cte);
                        }
                        else {
                            header('location: ../vistas/eliminarMov1.php');
                        }
            
            }  
    
    else if (isset($_POST['actualizar'])){
    
        $cte = $_POST['cte'];
        $asignado = $_POST['asignado'];
        $definido = $_POST['definido'];
        $comentario = $_POST['comentario'];
        $comentario=strtoupper($comentario);
        $serverName = "192.168.1.5";
        $connectionInfo = array( "Database"=>"V6INTER", "UID"=>"sa", "PWD"=>"Int3r_Cart0n.");
        $conn = sqlsrv_connect( $serverName, $connectionInfo );
        if( $conn === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        
    
            $contador=0; 
        $sql = "UPDATE Cte SET ListaPreciosEsp='$definido', Comentarios='$comentario' WHERE Cliente='$cte'";
                 
                  $stmt = sqlsrv_query( $conn, $sql );
                  $total=sqlsrv_num_rows($stmt);
                  if( $stmt === false) {
                      die( print_r( sqlsrv_errors(), true) );
                  }
if($asignado=="Seleccione nueva lista de precio"){
    header('location: ../vistas/mostrarListaPreciosCTE.php?cte='.$cte);
}
else{
                  $sql = "SELECT * FROM ListaPreciosCTEInter WHERE Cliente='$cte'";
                 
                  $stmt = sqlsrv_query( $conn, $sql );
                  $total=sqlsrv_num_rows($stmt);
                  if( $stmt === false) {
                      die( print_r( sqlsrv_errors(), true) );
                  }
                  $contador=0;
                      while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                        if($asignado==$row["ListaPrecios"]){
                           $contador=$contador+1; 
                        }else{
                         
                        }
                       
                        
                    }
                    if($contador==0){
                        $sql = "INSERT INTO ListaPreciosCTEInter (Cliente,ListaPrecios) VALUES ('$cte','$asignado')";
                        
                          $stmt = sqlsrv_query( $conn, $sql );
                         // $total=sqlsrv_num_rows($stmt);
                          if( $stmt === false) {
                              die( print_r( sqlsrv_errors(), true) );
                          }
                        header('location: ../vistas/mostrarListaPreciosCTE.php?cte='.$cte);
                    }
                    else {
                        header('location: ../vistas/mostrarListaPreciosCTE.php?cte='.$cte);
                    }
        
        }
    
    }
    



    else if (isset($_POST['eliminarLista'])){
    
        $cte = $_POST['cte'];
        $asignado = $_POST['asignado'];
        $definido = $_POST['definido'];
        $comentario = $_POST['comentario'];
        $serverName = "192.168.1.5";
        $connectionInfo = array( "Database"=>"V6INTER", "UID"=>"sa", "PWD"=>"Int3r_Cart0n.");
        $conn = sqlsrv_connect( $serverName, $connectionInfo );
        if( $conn === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        
    
            $contador=0; 
        $sql = "DELETE ListaPreciosCTEInter WHERE Cliente='$cte' and ListaPrecios='$asignado'";
                 
                  $stmt = sqlsrv_query( $conn, $sql );
                  //$total=sqlsrv_num_rows($stmt);
                  if( $stmt === false) {
                      die( print_r( sqlsrv_errors(), true) );
                  }
if($asignado=="Seleccione nueva lista de precio"){
    header('location: ../vistas/mostrarListaPreciosCTE.php?cte='.$cte);
}
else{
                 
                   
                        header('location: ../vistas/mostrarListaPreciosCTE.php?cte='.$cte);
                    
                   
        
        }
    }

    else if (isset($_POST['eliminarListaCompleta'])){
            $cte = $_POST['cte'];
        
        $serverName = "192.168.1.5";
        $connectionInfo = array( "Database"=>"V6INTER", "UID"=>"sa", "PWD"=>"Int3r_Cart0n.");
        $conn = sqlsrv_connect( $serverName, $connectionInfo );
        if( $conn === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
           
            $contador=0; 
         // este se debe borrar, de aqui mismo obtenemos las calidades   select * from ListaPreciosInter where Calidad='78'
        $sql = "DELETE ListaPreciosCTEInter WHERE Cliente='$cte'";
                 
                  $stmt = sqlsrv_query( $conn, $sql );


                  //$total=sqlsrv_num_rows($stmt);
                  if( $stmt === false) {
                      die( print_r( sqlsrv_errors(), true) );
                  }

 $sql2 = "UPDATE Cte set ListaPreciosEsp=' ' WHERE Cliente='$cte'";
                 
                  $stmt2 = sqlsrv_query( $conn, $sql2 );

                  
                  //$total=sqlsrv_num_rows($stmt);
                  if( $stmt2 === false) {
                      die( print_r( sqlsrv_errors(), true) );
                  }
                 
                   
                        header('location: ../vistas/mostrarListaPreciosCTEEliminar.php?cte='.$cte);                           
            }
    

    else if (isset($_POST['buscaCalidadEliminar'])){
    
        $calidad = $_POST['calidad'];
        echo $calidad;
        
        $serverName = "192.168.1.5";
        $connectionInfo = array( "Database"=>"V6INTER", "UID"=>"sa", "PWD"=>"Int3r_Cart0n.");
        $conn = sqlsrv_connect( $serverName, $connectionInfo );
        if( $conn === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
        
    
            $contador=0; 
        $sql = "SELECT * FROM ListaPreciosInter WHERE Calidad='$calidad'";
                 
                  $stmt = sqlsrv_query( $conn, $sql );
                  $total=sqlsrv_num_rows($stmt);
                  if( $stmt === false) {
                      die( print_r( sqlsrv_errors(), true) );
                  }
                  
                      while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                        $contador=$contador+1;
                    }
                    if($contador>=1){
                        header('location: ../vistas/mostrarCalidadesEliminar.php?calidad='.$calidad);
                    }
                    else {
                        header('location: ../vistas/eliminarCalidades.php');
                    }
        
        }  



        else if (isset($_POST['eliminarCalidadesCompletas'])){
            $calidad = $_POST['calidad'];
        
        $serverName = "192.168.1.5";
        $connectionInfo = array( "Database"=>"V6INTER", "UID"=>"sa", "PWD"=>"Int3r_Cart0n.");
        $conn = sqlsrv_connect( $serverName, $connectionInfo );
        if( $conn === false ) {
            die( print_r( sqlsrv_errors(), true));
        }
           
            $contador=0; 
         // este se debe borrar, de aqui mismo obtenemos las calidades   select * from ListaPreciosInter where Calidad='78'
        $sql = "DELETE ListaPreciosInter WHERE Calidad='$calidad'";
                 
                  $stmt = sqlsrv_query( $conn, $sql );


                  //$total=sqlsrv_num_rows($stmt);
                  if( $stmt === false) {
                      die( print_r( sqlsrv_errors(), true) );
                  }

                
                   
                        header('location: ../vistas/eliminarCalidades.php');                           
            }

       // eliminarCalidadesCompletas

    
?>
