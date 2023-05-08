<?php
    require_once('db.php');

    function getEmployeeData(){
        $sqlQuery = "SELECT * from employee";
        $connectedDatabase = create_connection(); 
        
        $result = $connectedDatabase->query($sqlQuery);
        $employeeData = array();
        
        for($i = 1; $i <= $result->num_rows; $i++){
            $employeeDataRow = $result->fetch_assoc();
            $employeeData[] = $employeeDataRow;
        }
        return $employeeData;
    }

    function get_employee_forDE(){
        $sql = "select * from employee inner join department on employee.departID = department.id";
        $conn = create_connection(); 
        
        $result = $conn->query($sql);
        $data = array();
        
        for($i = 1; $i <= $result->num_rows; $i++){
            $row = $result->fetch_assoc();
            $data[] = $row;
        }
        return $data;
    }

    function get_employee_limit(){
        $sql = "SELECT * from employee limit 6";
        $conn = create_connection(); 
        
        $result = $conn->query($sql);
        $data = array();
        
        for($i = 1; $i <= $result->num_rows; $i++){
            $row = $result->fetch_assoc();
            $data[] = $row;
        }
        return $data;
    }

    function get_employee_task(){
        $sql = "SELECT * from task limit 6";
        $conn = create_connection(); 
        
        $result = $conn->query($sql);
        $data = array();
        
        for($i = 1; $i <= $result->num_rows; $i++){
            $row = $result->fetch_assoc();
            $data[] = $row;
        }
        return $data;
    }
    
/*     $da = get_employee();
    print_r($da); */
?>