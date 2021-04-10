<?php
 $cliente = new SoapClient(null, array(
    'location' => "http://localhost/cp4/server.php",
    'uri' => "http://localhost/cp4/server.php",
    'trace' => 1
    ));

    $nombre=$_POST["nom"];
    $edad=$_POST["edad"];
    $telefono=$_POST["tel"];
    
    	try
        {
        $respuesta = $cliente -> __soapCall("insertarPaciente", [$nombre,$edad,$telefono]);
        echo "<script>
              alert('Agregado');
              window.location='cliente.php'
              </script>";
        }
    catch (SoapFault $ex)
            {
                echo $ex -> getMessage().PHP_EOL;
            }

    
         ?>