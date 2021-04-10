<?php
 $cliente = new SoapClient(null, array(
    'location' => "http://localhost/cp4/server.php",
    'uri' => "http://localhost/cp4/server.php",
    'trace' => 1
    ));

 if (isset($_GET['id'])) {
    $id= $_GET['id'];}

     $registros = "";

            $con = new mysqli("localhost","root","","cp4") or die ("Error al conectarse a la Base de datos");
            $query = "SELECT * FROM paciente WHERE id='$id'";
            $result = mysqli_query($con, $query);
            while ($registros = mysqli_fetch_array($result))
            {
              $nombre=$registros['nombre'];
              $edad=$registros['edad'];
              $telefono=$registros['telefono'];
            }

    ?>


<form action="actu.php" method="post">
 <table class="table table-striped" border="1" align="center">

 	    <tr>
            <td>ID</td> <td><input type="text" name="id" id="id" value="<?php echo ($id); ?>"> </td> </tr>
        <tr>
            <td>Nombre</td> <td><input type="text" name="nom" id="nom" value="<?php echo ($nombre); ?>"> </td> </tr>
         <tr>
            <td>Edad</td> <td><input type="text" name="edad" id="edad" value="<?php echo ($edad); ?>"> </td> </tr>
        <tr>
            <td>Telefono</td> <td><input type="text" name="tel" id="tel" value="<?php echo ($telefono); ?>"> </td> </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit"  name="enviar" value="Actualizar"></td></tr>
    </table>
    </form>