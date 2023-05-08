<?php
require_once('db.php');
    function getDirectorData(){
        $sqlQuery = "SELECT * from director";
        $connectedDatabase = create_connection();

        $result = $connectedDatabase->query($sqlQuery);
        $directorData = array();
        
        for($i = 1; $i <= $result->num_rows; $i++){
            $directorDataRow = $result->fetch_assoc();
            $directorData[] = $directorDataRow;
        }

        return $directorData;
    }

    /* $data = get_director();
    print_r($data); */
?>