<?php
    $cliente = new SoapClient(null, array(
    'location' => "http://localhost/cp4/server.php",
    'uri' => "http://localhost/cp4/server.php",
    'trace' => 1
    ));
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pacientes</title>
    </head>
    <body>
        <h1 align="center">Pacientes</h1>
        <table class="table table-striped" border="1" align="center">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Edad</th>
            <th scope="col">Telefono</th> 
            <th scope="col">Otros</th> 
            <th scope="col">Otros</th>     
        </tr>
       
        <?php
            try
            {
                echo $respuesta = $cliente -> __soapCall("obtenerPaciente", []);
            }
            catch (SoapFault $ex)
            {
                echo $ex -> getMessage().PHP_EOL;
            }
        ?>
         </table>
        <p></p><br>

         <form action="insertar.php" method="post">
        <table class="table table-striped" border="1" align="center">
        <tr>
            <td>Nombre</td> <td><input type="text" name="nom" id="nom" required="required"> </td> </tr>
        <tr>
            <td>Edad</td> <td><input type="text" name="edad" id="edad" required="required"> </td> </tr>
        <tr>
            <td>Telefono</td> <td><input type="text" name="tel" id="tel "required="required"> </td> </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit"  name="enviar" value="Agregar"></td></tr>
        </table>
      </form>


            



    </body>
    </html>
