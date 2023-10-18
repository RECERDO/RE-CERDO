<?php

  include ("admin/basededatos/databases.php");




    if(isset($_GET['id'])){


         $id = $_GET['id'];

     var_dump();
     exit;


     $query =$bd->prepare("SELECT imagen FROM carnes WHERE id = '${id}'");

    $query->execute();

     $imagenborrar = $query->fetch(PDO::FETCH_LAZY);



     if(isset($imagenborrar['imagen'])){

            if(file_exists("../../../admin/imagenes/".$imagenborrar['imagen'].'.jpg')){

            unlink("../../../admin/imagenes/" . $imagenborrar['imagen'].'.jpg'); 
             }
     }
 
}


$query = $bd ->prepare ("SELECT * FROM carnes");

$query->execute();

$listaPortafolio =$query->fetchALL(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>

    <head>
	<title>Recerdo 2023.</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="estilos/estilos.css">
	</head>

	<body>

		   <!-- MENU INICIO -->
		   
		   <?php  include("header.php"); ?>

           <!-- OPCIONES -->

           <div class="containerpr">
            <div class="productosall">
           <?php  foreach($listaPortafolio as $portafolio):?>
            <div class="productos">
            <img src="images/carnes/<?php echo $portafolio['imagen']; ?>.jpg" class="imagen-tabla"> 
                <Div class="galeriatxt">
                <h1><?php  echo $portafolio['nombre_producto'];?></h1>
                <p><?php  echo $portafolio['precio'];?></p>
                <p><?php  echo $portafolio['descripcion'];?></p>
                </Div>
            </div>
            <?php  endforeach;?>
           </div> 
           </div>

           <!-- FOOTER -->

           <?php  include("foter.php"); ?>
    </body>

</html>