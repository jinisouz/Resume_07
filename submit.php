<?php
     //database configuration
     $servername="localhost" ;//change if necessary
     $username="root";//change to your Mysql username
     $password="";//change to your Mysql password
     $dbname="form_db";

     //create connection
     $conn=new mysqli( $servername,$username,$password,$dbname);

     //check connection
     if($conn->connect_error){
     	die("connection failed:".conn->connect_error);
     }
     else{
     	echo "connected";
     }

     //get form data
     $name=$_POST['txtname'];
     $email=$_POST['txtemail'];
     $contact=$_POST['txtcontact'];
     

     echo "<h3> $name <br> $email <br> $contact </h3>";

     //prepare and build 
     $stmt=$conn->prepare("INSERT INTO form_info(name,email,contact) VALUES(?,?,?)");
     $stmt->bind_param("ssss",$name,$email,$contact);

     if($stmt->execute()){
     	echo "new record created successfully";
     }
     else{
     	echo "error:".$stmt->error;
     }
     //close connections
     $stmt->close();
     $conn->close();
?>