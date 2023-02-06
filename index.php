<?php
$fname = filter_input(INPUT_POST, 'fname');
$lname = filter_input(INPUT_POST, 'lname');
$aadhar = filter_input(INPUT_POST, 'aadr');
$dob = filter_input(INPUT_POST, 'dob');
$addr = filter_input(INPUT_POST, 'addr');
$city = filter_input(INPUT_POST, 'city');
$workcategory = filter_input(INPUT_POST, 'workcategory');



if (!empty($fname)){
    if (!empty($lname)) {
        if (!empty($aadhar)) {
            if (!empty($dob)) {
                if (!empty($addr)) {
                    if (!empty($city)) {
                        if (!empty($workcategory)) {

                            $host = "localhost";
                            $dbusername = "root";
                            $dbpassword = "";
                            $dbname = "user";
                            // Create connection
                            $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
                            if (mysqli_connect_error()) {
                                die('Connect Error (' . mysqli_connect_errno() . ')
                                 '. mysqli_connect_error());
                            } else {
                                $sql = "INSERT INTO form (fname, lname, aadhar, dob, addr, city, workcategory) values ('$fname','$lname','$aadhar','$dob','$addr','$city','$workcategory')";
                                if ($conn->query($sql)) {
                                    echo "New record is inserted sucessfully";
                                }
                                 else {
                                    echo "Error: " . $sql . "
                                    " . $conn->error;
                                }

                                $conn->close();
                            }
                        }
                    }
                }
            }
        }
    }

  else{  
 echo "Password should not be empty";
 die();
   }
}
else{
echo "Username should not be empty";
die();
}

?>
