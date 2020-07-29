<?php
$fname= $_POST['fname'];
$lname= $_POST['lname'];
$email= $_POST['email'];

if(isset($_POST['insert']))
{
    $file=$_FILES['file'];
	$fileName= $_FILES['file']['name'];
	$fileType= $_FILES['file']['type'];
	$fileTmpName= $_FILES['file']['tmp_name'];
	$fileError= $_FILES['file']['error'];
	$fileSize= $_FILES['file']['size'];

	$fileExt=explode('.',$fileName);//to seperate two pieces of data of filename
	$fileActualExt=strtolower(end($fileExt));

	$allowed= array('jpg','jpeg','png','pdf');
	if(in_array($fileActualExt,$allowed))
	{
		if($fileError==0)
		{
			if($fileSize<10000000)
			{
				$fileNameNew=uniqid('',true).".".$fileActualExt;
				$fileDestination='upload/'.$fileNameNew;
				move_uploaded_file($fileTmpName,$fileDestination);
				header("Location: js.php?uploadsuccess");
			}
			else{
				echo "Your file is too big to upload";
			}
		}
		else{
			echo "There was an error uploading your file!";
		}
	}
	else{
		echo "You cannot upload files of this type";
	}

}

if(!empty($fname) || !empty($lname) || !empty($email))
{
    $host="localhost:3306";
    $dbusername="root";
    $dbpassword=" ";
    $dbname="mysql";

    $conn = mysqli_connect($host,$dbusername,$dbpassword,$dbname);
    if(mysqli_connect_error())
    {
        die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());  
    }
    else{
        $SELECT = "SELECT email FROM register1 WHERE email=? Limit 1";
        $INSERT = "INSERT Into register1(fname,lname,email) values(?,?,?)";
        
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


        }
        $stmt->close();
        $conn->close();
    }

else
{
    echo "all field are required";
    die();
}

?>
