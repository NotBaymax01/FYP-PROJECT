<html>
<head>
 <title>delete alumni record</title>
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
        
    //get input value
    $icNum=$_GET['icNum'];
    
    // sql to delete a record
    $sql = "DELETE FROM alumni WHERE icNumber='$icNum'";
    if ($conn->query($sql) === TRUE) {
        echo '<script>
            alert("Alumni data deletion success");
            window.location.replace("viewAlumni.php");
            </script>';
    }
    else {
        echo '<script>
            alert("Alumni data deletion failed");
            window.location.replace("viewAlumni.php");
            </script>'. $conn->error;
    }
    //close connection
    $conn->close();
?>
</body>
</html>