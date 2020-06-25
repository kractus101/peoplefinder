<?php
$fname= $_POST['fname'];
$lname= $_POST['lname'];
$email= $_POST['email'];

if(!empty($fname) || !empty($lname) || !empty($email))
{
    $host="localhost:3306";
    $dbusername="root";
    $dbpassword=" ";
    $dbname="coursera";

    $conn = mysqli_connect($host,$dbusername,$dbpassword,$dbname);
    if(mysqli_connect_error())
    {
        die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());  
    }
    else{
        $SELECT = "SELECT email FROM register WHERE email=? Limit 1";
        $INSERT = "INSERT Into register(fname,lname,email) values(?,?,?)";
        
        //prepare statement
        $stmt= $conn->prepare($SELECT);
        
        if($stmt = $conn->prepare($SELECT)) {        
            $stmt->bind_param('s', $email);
            $stmt->bind_result($email);
            printf("Number of rows: %d.\n", $stmt->num_rows);

        } else {
            $error = $conn->errno . ' ' . $conn->error;
            echo $error;
        }
    
      //  $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum= $stmt->num_rows;

        if($rnum==0)
        {
            $stmt->close();
            $stmt= $conn->prepare("INSERT");
            
        if($stmt = $conn->prepare($INSERT)) {        
            $stmt->bind_param('sss',$fname,$lname, $email);
            $stmt->execute();
            echo "New record inserted sucessfully!";
        } else {
            $error = $conn->errno . ' ' . $conn->error;
            echo $error;
        }
          //  $stmt->bind_param("sss",$fname,$lname,$email);
          //  $stmt->execute();
         //   echo "New record inserted sucessfully!";

        }
        else{
            echo "Someone already registered using this email";
        }
        $stmt->close();
        $conn->close();
    }
}
else
{
    echo "all field are required";
    die();
}

?>