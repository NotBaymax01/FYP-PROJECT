<html>
<head>
<title>register</title>
</head>
<body>
	
 <?php
	
	$servername = "localhost";
 	$username = "root";
 	$password = "";
 	$dbname = "alumniSystem";

 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);

   // Check connection
   if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error); 
   }
	
	 // Define $myusername and $mypassword
    $username=$_POST['username'];
    $mypassword=$_POST['password'];
	
    $sql = "SELECT username, password FROM admin WHERE username='$username' and password='$mypassword'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
         header("location: adminMenu.html");
    }
    else
    {
       echo '<script>
              alert("Wrong username or Password. Please try again");
              window.location.replace("LogIn.html");
    		</script>';
    }
    $conn->close();
 ?> 
	
</body>
</html>