<?php
    require_once('db.php');
    
    function isLogin($username, $password){
        $conn = create_connection();
        
        $sql = "SELECT * FROM account WHERE username = ?";
        
        $stm = $conn->prepare($sql);
        $stm-> bind_param('s', $username);
        if (!$stm->execute()) return false;

        $result = $stm->get_result();
        if ($result->num_rows !== 1) return false;
        $data = $result->fetch_assoc();
        
        return ($password == $data['password']);
    }

    function getAccountData(){
        $sqlQuery = "SELECT * from account";
        $connectedDatabase = create_connection();
        $result = $connectedDatabase->query($sqlQuery);
        $accountData = array();

        for($i = 1; $i <= $result->num_rows; $i++){
            $row = $result->fetch_assoc();
            $accountData[] = $row;
        }

        return $accountData;
    }

    function get_account1(){
        $sql = "SELECT * from account";
        $conn = create_connection();
        $result = $conn->query($sql);
        $data = array();

        for($i = 1; $i <= $result->num_rows; $i++){
            $row = $result->fetch_assoc();
            $data[] = $row;
        }

        return $data;
    }

    function get_account2(){
        $sql = "SELECT * from account order by datetimes desc limit 10";
        $conn = create_connection();
        $result = $conn->query($sql);
        $data = array();

        for($i = 1; $i <= $result->num_rows; $i++){
            $row = $result->fetch_assoc();
            $data[] = $row;
        }

        return $data;
    }

    // var_dump(login('anhduc', 'anhduc01'));
    
    function addAccount($id, $decentralization, $username, $password, $datetimes)
    {
        $sql = "select count(*) from account where id = ? or username = ? ";
        $conn = create_connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('ss',$id, $username); 
        $stm->execute();

        $result = $stm->get_result();
        $exists = $result->fetch_array()[0] === 1;

        //var_dump($exists);
        //echo $id;
        if($exists){
            //echo ' trung id or username';
            return "can't add because username , password or ID is exists";
        }

        //$hashed = password_hash($password, PASSWORD_DEFAULT);
        $sql = "insert into account(id, decentralization, username, password, active, datetimes) values(?,?,?,?,0,?)";

        $stm = $conn->prepare($sql);
        $stm->bind_param('sssss',$id, $decentralization, $username, $password, $datetimes);
        if($stm->execute()) return true;

        return $stm->error;
    }

    //addAccount('emp025','employee','hoanganh13','hoanganh13','2021/10/15');

    function addDepart($id, $fullname, $addresses, $img, $falculty, $gender, $phone, $email, $country)
    {
        // $sql = "select count(*) from department where id = ? or phone = ? or email = ? ";
        $conn = create_connection();

        $sql = "insert into department(id, fullname, addresses, img, falculty, gender, phone, email, country) values (?,?,?,?,?,?,?,?,?)";

        $stm = $conn->prepare($sql);
        $stm->bind_param('sssssssss',$id, $fullname, $addresses, $img, $falculty, $gender, $phone, $email, $country);
        if($stm->execute()) return true;

        return $stm->error;
    }

        //addDepart('dept007','Nguyen Van Teo','245 Nguyen Van Linh, district 7,Ho Chi minh City','departimg007.jng','ff7','male','0123456999','van@gmail.com','Vietnam');
        //addDepart('dept007','','','','ff7','','0123456999','van@gmail.com','');
        //addDepart('dept014','','','','ff13','','123','thuhang@gmail.com','');

    
    
    function addEmployee($id, $fullname, $addresses, $img, $departID, $gender, $phone, $email, $country)
    {
        // $sql = "select count(*) from employee where id = ? or phone = ? or email = ?";
        $conn = create_connection();

        // $stm = $conn->prepare($sql);
        // $stm->bind_param('sss',$id, $phone, $email);
        // $stm->execute();

        // $result = $stm->get_result();
        // $exists = $result->fetch_array()[0] === 1;

        // //var_dump($exists);
        // if($exists){
        //     //echo "exists man";
        //     return "can't add it is exists";
        // }

        //$sql = "insert into employee(id, fullname, addresses, img, gender, phone, email, country, departID) values(?,?,?,?,?,?,?,?,?)";
        $sql = "insert into employee(id, fullname, addresses, img, departID, gender, phone, email, country) values(?,?,?,?,?,?,?,?,?)";

        $stm = $conn->prepare($sql);
        $stm->bind_param('sssssssss', $id, $fullname, $addresses, $img, $departID, $gender, $phone, $email, $country);
        if($stm->execute()) return true;

        return $stm->error;
    }

    function uploadEmp($fullname, $addresses, $gender, $phone, $email, $country, $id)
    {
        // $sql = "select count(*) from employee where id = ? or phone = ? or email = ?";
        $conn = create_connection();

        // $stm = $conn->prepare($sql);
        // $stm->bind_param('sss',$id, $phone, $email);
        // $stm->execute();

        // $result = $stm->get_result();
        // $exists = $result->fetch_array()[0] === 1;

        // //var_dump($exists);
        // if($exists){
        //     //echo "exists man";
        //     return "can't add it is exists";
        // }

        //$sql = "insert into employee(id, fullname, addresses, img, gender, phone, email, country, departID) values(?,?,?,?,?,?,?,?,?)";
        $sql = "update employee set fullname = ?, addresses = ?, gender = ?, phone = ?, email = ?, country = ? where ? = id";

        $stm = $conn->prepare($sql);
        $stm->bind_param('sssssss', $fullname, $addresses, $gender, $phone, $email, $country, $id);
        if($stm->execute()) return true;

        return $stm->error;
    }

    // uploadEmp('dat tien', 'aaaa', 'male', '14243423433', 'fasfsdsd@gmail.com', 'cdfsdd', 'emp003');

    //addEmployee('emp022','Nguyen Van Teo','245 Nguyen Van Linh, district 7,Ho Chi minh City','','male','0123456','vanteo789@gmail.com','Vietnam','dept001');

    function updateDepart($id, $fullname, $addresses, $img, $falculty, $gender, $phone, $email, $country)
    { 
        $sql = "select count(*) from department where id = ?";
        $conn = create_connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$id);
        $stm->execute();

        $result = $stm->get_result();
        $exists = $result->fetch_array()[0] === 1;

        //var_dump($exists);
        if($exists){
            //echo "It exists man";
            return "can't add it is exists";
        }

        $sql = "update department set fullname = ?, addresses = ?, img = ?, falculty = ?, gender = ?, phone = ?, email = ?, country = ? where id = ?";

        $stm = $conn->prepare($sql);
        $stm->bind_param('sssssssss',$id, $fullname, $addresses, $img, $falculty, $gender, $phone, $email, $country);
        if($stm->execute()) return true;

        return $stm->error;
    }

    //updateDepart('dept008','Nguyen Van Teo','245 Nguyen Van Linh, district 7,Ho Chi minh City','departimg007.jng','ff7','male','0123456999','vanteo@gmail.com','Vietnam');


    function deleteDepart($id)
    { 
        $sql = "select count(*) from department where id = '$id'";
        $conn = create_connection();

        $stm = $conn->prepare($sql);
        //$stm->bind_param('s',$id);
        $stm->execute();

        $result = $stm->get_result();
        $exists = $result->fetch_array()[0] === 1;

        //var_dump($exists);
        if($exists){
            //echo "It exists man";
            return "can't add it is exists";
        }

        $sql = "DELETE FROM department WHERE id = '$id'";

        $stm = $conn->prepare($sql);
        //$stm->bind_param('s',$id);
        if($stm->execute()) return true;

        return $stm->error;
    }

    //deleteDepart('emp008');
    function updateD($fullname, $addresses, $gender, $phone, $email, $country, $id)
    { 
        $sql = "update department set fullname = ?, addresses = ?, gender = ?, phone = ?, email = ?, country = ? where id = ?";
        $conn = create_connection();
        
        $stm = $conn->prepare($sql);
        $stm->bind_param('sssssss', $fullname, $addresses, $gender, $phone, $email, $country, $id);
        
        $stm->execute();
        return ($stm->affected_rows === 1);

    }
    // updateD('dept012','nam','245 BL','depar.jng','ff7','male','0123456999','vanteo@gmail.com','Vietnam');
    


    function deleteD($id)
    { 
        $sql = "DELETE FROM department WHERE id = ?";
        $conn = create_connection();

        $stm = $conn->prepare($sql);
        $stm->bind_param('s',$id);
        
        $stm->execute();
        return ($stm->affected_rows === 1);
    }
    //deleteD('dept008');

    function update_Edit_Fac($id, $nameMajor, $email){
        $sql = "update major set nameMajor = ?, email = ? where id = ?";
        $conn = create_connection();
        
        $stm = $conn->prepare($sql);
        $stm->bind_param('sss',$nameMajor, $email, $id);
        
        $stm->execute();
        return ($stm->affected_rows === 1);
    }

    function addTask($id, $nametask, $departid, $employid, $status, $daycreate) {
            // $sql = "select count(*) from employee where id = ? or phone = ? or email = ?";
            $conn = create_connection();
    
            // $stm = $conn->prepare($sql);
            // $stm->bind_param('sss',$id, $phone, $email);
            // $stm->execute();
    
            // $result = $stm->get_result();
            // $exists = $result->fetch_array()[0] === 1;
    
            // //var_dump($exists);
            // if($exists){
            //     //echo "exists man";
            //     return "can't add it is exists";
            // }
    
            //$sql = "insert into employee(id, fullname, addresses, img, gender, phone, email, country, departID) values(?,?,?,?,?,?,?,?,?)";
            $sql = "insert into task(id, nametask, departid, employid, status, dayCreate) values(?,?,?,?,?,?)";
    
            $stm = $conn->prepare($sql);
            $stm->bind_param('ssssss', $id, $nametask, $departid, $employid, $status, $daycreate);
            if($stm->execute()) return true;
    
            return $stm->error;
        }


        function addDetailTask($id, $des, $start, $end, $mark, $filename) {
            // $sql = "select count(*) from employee where id = ? or phone = ? or email = ?";
            $conn = create_connection();
    
    
            //$sql = "insert into employee(id, fullname, addresses, img, gender, phone, email, country, departID) values(?,?,?,?,?,?,?,?,?)";
            $sql = "insert into detailtask(id, description, stars, ends, mark, filename) values(?,?,?,?,?,?)";
    
            $stm = $conn->prepare($sql);
            $stm->bind_param('ssssss', $id, $des, $start, $end, $mark, $filename);
            if($stm->execute()) return true;
    
            return $stm->error;
        }

        // addDetailTask('t0043', 'sadfsdfdfdsd', '2021-12-01', '2021-12-25', 0);
?>