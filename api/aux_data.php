<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "medico_farmacia";

    $conn = mysqli_connect($servername,$username,$password,$database);

    if(!$conn){
        die("Error de conexión". mysqli_connect_error());
    }
    $counta = 0;
    $sql = "select id_titular FROM beneficiarios GROUP BY id_titular";

    $result_group =  mysqli_query($conn,$sql);

    if(mysqli_num_rows($result_group) > 0){
        while($id_titular = mysqli_fetch_assoc($result_group)){
            $id =  $id_titular["id_titular"];
            $sql2 = "SELECT * FROM titulares WHERE id_titular = $id";

            $result_sql2 = mysqli_query($conn,$sql2);
            $titular = mysqli_fetch_assoc($result_sql2);

            $nombre = $titular["Nombre"];
            $apellidos = $titular["Apellidos"];
            $departamento = $titular["Departamento"];

            $sql3 = "UPDATE pacientes SET id_titular = $id WHERE name = '$nombre' AND lastname = '$apellidos' AND departament = '$departamento'";
            if(mysqli_query($conn,$sql3)){
                $counta = $counta + 1;
            }

        }
    }else{
        echo "0 Resultados";
    }

    echo $counta;
    mysqli_close($conn);
?>