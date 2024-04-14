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

// Get input values from the form
$name = $_POST['name'];
$icNum = $_POST['icNum'];
$telNum = $_POST['telNum'];
$email = $_POST['email'];
$address = $_POST['address'];
$job = $_POST['job'];

// SQL to update record in the database
$sql = "UPDATE alumni SET name='$name', telNum='$telNum', email='$email', address='$address', currentJob='$job' WHERE icNumber='$icNum'";

if ($conn->query($sql) === TRUE) {
    echo '<script>
            alert("Record updated successfully");
            window.location.replace("viewAlumni.php");
            </script>';
} else {
    echo '<script>
            alert("Record updated failed");
            window.location.replace("viewAlumni.php");
            </script>' . $conn->error;
}

$conn->close();
?>