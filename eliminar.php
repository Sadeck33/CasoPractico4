<?php
 $cliente = new SoapClient(null, array(
    'location' => "http://localhost/cp4/server.php",
    'uri' => "http://localhost/cp4/server.php",
    'trace' => 1
    ));

 if (isset($_GET['id'])) {
    $id= $_GET['id'];}

{
     try
        {
        $respuesta = $cliente -> __soapCall("eliminarPaciente", [$id]);
        echo "<script>
              alert('Eliminado');
              window.location='cliente.php'
              </script>";
        }
    catch (SoapFault $ex)
            {
                echo $ex -> getMessage().PHP_EOL;
            }
    }