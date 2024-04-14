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

// Retrieve form data
$name = $_POST['name'];
$icNum = $_POST['icNum'];
$telNum = $_POST['telNum'];
$email = $_POST['email'];
$address = $_POST['address'];
$job = $_POST['job'];

// Check if ICnum already exists
$sqlCheck = "SELECT icNumber FROM alumni WHERE icNumber = '$icNum'";
$resultCheck = $conn->query($sqlCheck);

if ($resultCheck->num_rows > 0) {
    echo '<script>
            alert("This IC Number already exists. Please input a different IC Number");
            window.location.replace("homepage.html");
          </script>';
} else {

    // Create query
    $sql = "INSERT INTO alumni (name, icNumber, telNum, email, address, currentJob) VALUES ('$name', '$icNum', '$telNum', '$email', '$address', '$job')";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        echo '<script>
              alert("Thank you for joining Alumni Community");
              window.location.replace("homepage.html");
            </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
	
</body>
</html>