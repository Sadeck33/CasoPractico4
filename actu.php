<?php
 $cliente = new SoapClient(null, array(
    'location' => "http://localhost/cp4/server.php",
    'uri' => "http://localhost/cp4/server.php",
    'trace' => 1
    ));
    $id=$_POST['id'];
    $nombre=$_POST["nom"];
    $edad=$_POST["edad"];
    $telefono=$_POST["tel"];
    
    	try
        {
        $respuesta = $cliente -> __soapCall("actualizarPaciente", [$id,$nombre,$edad,$telefono]);
        echo "<script>
              alert('Actualizado $nombre $edad ');
              window.location='cliente.php'
              </script>";
        }
    catch (SoapFault $ex)
            {
                echo $ex -> getMessage().PHP_EOL;
            }

    
         ?>