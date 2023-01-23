
<?php
  $fname = $_POST['fname'];
  $age = $_POST['age'];
  $mnum = $_POST['mnum'];
  $anum = $_POST['anum'];
  $addr = $_POST['addr'];

  if (!empty($fname) || (!empty($age) || (!empty($mnum) || (!empty($anum) || (!empty($addr))
  {
    // database details
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "users";

    //Create Connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()){
        die('connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else{
        $SELECT = "SELECT mnum from regestration_form Where mnum = ? Limit 1";
        $INSERT = "INSERT into regestration_form (fname, age, mnum, anum, addr) values(?, ?, ?, ?, ?)";
    
        //Prepare statement
        $stmt = $conn->prepar($SELECT);
        $stmt->bind_param ("s", $mnum);
        $stmt->execute();
        $stmt->bind_result($mnum);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if($rnum==0){
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ssssii", $fname, $age, $mnum, $anum, $addr);
            $stmt->execute();
            echo "New record inserted sucessfully";
        }else{
            echo "Someone is already registerd using this phone number";
        }
        stmt->close();
        $conn->close();
        
        }

  }
  else{
    echo "All field are required";
    die();
  }


    


   

  

?>