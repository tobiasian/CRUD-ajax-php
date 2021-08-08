<?php
    include('database.php');
    $search = $_POST['search'];

    if(!empty($search)){
        $query = "SELECT * FROM tareas WHERE tarea LIKE '$search%'";
        $result = mysqli_query($connection, $query);

        if(!$result) {
            die('Query error'.mysqli_error($connection));
        };

        $json = array();

        while($row = mysqli_fetch_array($result)){
                $json[] = array(
                'nombre' => $row['tarea'],
                'descripcion' => $row['descripcion'],
                'id' => $row['id'],
            );
        }

        $jsonstring = json_encode($json);
        echo $jsonstring;

    };



?>