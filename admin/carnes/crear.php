<?php

 include ("../basededatos/databases.php");


 if($_POST){


$nombre_producto = (isset($_POST['nombre_producto']))?$_POST['nombre_producto']:"";
$precio = (isset($_POST['precio']))?$_POST['precio']:"";
$imagen = $_FILES['imagen'];
$descripcion = (isset($_POST['descripcion']))?$_POST['descripcion']:"";



    $carpetaImagenes = '../../images/carnes/';

    if(!is_dir($carpetaImagenes)){

      mkdir($carpetaImagenes);
    }

     $nombreimagen = md5( uniqid( rand(),true));


    move_uploaded_file($imagen['tmp_name'],$carpetaImagenes  . $nombreimagen .'.jpg');

$query = $bd->prepare(" INSERT INTO `carnes` ( `nombre_producto`, `precio`,  `imagen`, `descripcion`)
 VALUES ( '${nombre_producto}', '${precio}', '${nombreimagen}', '${descripcion}');");

$query->execute();


 }


?>
<body>
  
<main class="main"> 
  <h2 class="titulo1">Crear producto carne</h2>
 
<form action="" method="POST" enctype ="multipart/form-data" class="centrar formulario">
    <fieldset>
        <legend>Datos del Abrigos</legend>

        <label for="nombre_producto">Nombre</label>
        <input type="text" id="tituloportafolio" name="nombre_producto" placeholder="Ingresa el titulo del portafolio">

        <label for="precio">Precio</label>
        <input type="number" id="subtituloportafolio" name="precio" placeholder="Ingresa el subtitulo del portafolio">


        <label for="imagen">Imagen</label>
        <input type="file" id="imagenportafolio" name="imagen" accept="image/jpeg, image/png" >

        <label for="descripcion">descripcion</label>
        <input type="text" id="descripcionportafolio" name="descripcion" placeholder="Ingresa la descripcion del portafolio">



        
    </fieldset>

  <div>
  <button class="btn btn-primary" type="submit">Agregar carne</button>
    <a href="index.php" class="btn btn-primary">Cancelar</a>
  </div>
</form>

</main>
</body>
</html>