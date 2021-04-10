<?php
    class Paciente
    {
        public function obtenerPaciente()
        {
            $registros = "";

            $con = new mysqli("localhost","root","","cp4") or die ("Error al conectarse a la Base de datos");
            $query = "SELECT * FROM paciente";
            $result = mysqli_query($con, $query);

            foreach ($result as $datos) {
                $registros .= ("<tr>");
                $registros .= ("<td>" . $datos['id'] . "</td>");
                $registros .= ("<td>" . $datos['nombre'] . "</td>");
                $registros .= ("<td>" . $datos['edad'] . "</td>");
                $registros .= ("<td>" . $datos['telefono'] . "</td>");
                $registros .= ("<td >
            <form action='eliminar.php?id=".$datos['id']."' method='post'>
            <button name='id' class='btn btn-danger id-eliminar'>Eliminar
            </form>
            </td>");
                $registros .= ("<td >
            <form action='actualizar.php?id=".$datos['id']."' method='post'>
            <button name='id' class='btn btn-danger id-editar'>Editar
            </form>
            </td>");
                $registros .= ("</tr>");
            }
            return $registros;
        }

        public function insertarPaciente($nombre,$edad,$telefono)
        {
            $con = new mysqli("localhost","root","","cp4") or die ("Error al conectarse a la Base de datos");
            $mysql = "INSERT INTO paciente(nombre,edad,telefono) VALUES ('$nombre','$edad','$telefono')";
            $result=$con->query($mysql);
        }

        public function eliminarPaciente($id)
        {
            $con = new mysqli("localhost","root","","cp4") or die ("Error al conectarse a la Base de datos");
            $mysql = "DELETE FROM paciente WHERE id='$id'";
            $result=$con->query($mysql);
        }

        public function actualizarPaciente($id,$nombre,$edad,$telefono)
        {
        $con = new mysqli("localhost","root","", "cp4");
        $mysql = "UPDATE paciente SET nombre='$nombre',edad='$edad',telefono='$telefono' WHERE id='$id'";
        if ($con->query($mysql) === TRUE)
         {
            echo "<script>
              alert('Actualizado');
              window.location='cliente.php'
              </script>";
      } else {
        echo "Error: " . $conn->error;
      }
            
        }
    }
    try
    {
        $server = new Soapserver(
            null, ['uri' => 'http://localhost/cp4/server.php']
        );
        $server -> setClass("Paciente");
        $server -> handle();
    }
    catch(SoapFault $e){
        print $e -> faultstring;
    }
?>